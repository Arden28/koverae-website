<?php

namespace App\Http\Livewire\Trial;

use App\Models\DB2\Company;
use App\Models\DB2\Currency;
use App\Models\DB2\Team;
use App\Models\DB2\User;
use App\Models\KoverCompany;
use App\Models\User as ModelsUser;
use App\Services\PlanService;
use App\SMS\Services\VonageService;
use Bpuig\Subby\Models\Plan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Hash;

class AppSelection extends Component
{
    public $currentStep = 1;

    public $selectedApps = [];

    // Additional properties to handle subscription logic
    public $isFreeForever = false;
    public $isTrial = false;
    public $message = '';

    public $countries = [
        'Congo' => 'République du Congo',
        'Congo RDC' => 'République Démocratique du Congo',
        'Gabon' => 'Gabon',
        'Cameroun' => 'Cameroun',
    ];

    public $cities = [
        'Congo' => ['Brazzaville', 'Pointe Noire', 'Ouesso', 'Dolisie'],
        'Congo RDC' => ['Kinshasa', 'Goma'],
        'Gabon' => ['Libreville', 'Franceville', 'Port-gentil'],
        'Cameroun' => ['Yaoundé', 'Douala'],
        // "Côte d'Ivoire" => ['Abidjan', 'Yamsoukro', '],
    ];
    public $name;
    public $role;
    public $email;
    public $country = '';
    public $city = '';
    public $address;
    public $phone;
    public $industry;
    public $size;
    public $primary_interest;
    public $domain_name = '';
    public $company_name;
    public $currency_code;
    public $company_address;

    public function mount(){
        if(auth()->user()){
            $this->name = auth()->user()->name;
            $this->email = auth()->user()->email;
            $this->phone = auth()->user()->phone;
            $this->address = auth()->user()->street;
            $this->country = auth()->user()->country;
            $this->city = auth()->user()->city;
        }
    }

    protected $rules= [
        'name' => 'required|max:50',
        'role' => 'required',
        'email' => 'required|email',
        'phone' => 'string|required|min:9|unique:users,phone',
        'address' => 'string|required',
        'country' => 'string|required',
        'city' => 'string|required',
        'industry' => 'string|nullable',
        'size' => 'string|nullable',
        'primary_interest' => 'nullable',
        'company_name' => 'required|max:50|unique:mysql_2.companies,name',
        'currency_code' => 'required|string',
        'company_address' => 'required|string',

    ];

    public function nextStep()
    {
        $this->currentStep++;
    }
    public function previousStep()
    {
        $this->currentStep--;
    }

    public function toggleApp($appSlug)
    {
        if (in_array($appSlug, $this->selectedApps)) {
            $this->selectedApps = array_diff($this->selectedApps, [$appSlug]);
        } else {
            $this->selectedApps[] = $appSlug;
        }

        // Update subscription status based on the number of selected apps
        $this->updateSubscriptionStatus();
    }

    protected function updateSubscriptionStatus()
    {
        $this->isFreeForever = count($this->selectedApps) <= 1;
        $this->isTrial = count($this->selectedApps) > 1;
    }

    // public function continue()
    // {
    //     // Implement the logic to handle subscription or trial initiation here.
    //     $user = User::find(auth()->user()->id);

    //     // This might involve creating a subscription record, starting a trial period, etc.
    //     // $planService = new PlanService;
    //     // $plan = $this->choosePlan();
    //     // $planService->createSubscription($user, $plan);
    //     $this->generateUserUrl(str()->slug($this->company_name), $this->selectedApps, $this->company_name);
    // }

    public function continue(){

        // Create the user and the company
        DB::connection('mysql_2')->transaction(function(){

            $this->validate();
            $kovers = ModelsUser::all();
            $users = User::all();
            if($users->firstWhere('email', $this->email) || $kovers->firstWhere('email', $this->email) ){

                $kover = $kovers->firstWhere('email', $this->email);
                $user = $users->firstWhere('email', $this->email);
            }elseif($users->firstWhere('phone', $this->phone) || $kovers->firstWhere('phone', $this->phone)){

                $user = $users->firstWhere('phone', $this->phone);
                $kover = $kovers->firstWhere('phone', $this->phone);
            }else{

                // Create Kover
                $kover = ModelsUser::create([
                    'name' => $this->name,
                    'email' => $this->email,
                    'phone' => $this->phone,
                    'unique_id' => Uuid::uuid4(),
                    'society' => $this->company_name,
                    'user_type' => 'kover',
                    // 'password' => Hash::make('koverae'),
                ]);
                $kover->save();


                $code = Uuid::uuid4();

                // Create team
                $team = Team::create([
                    'uuid' => $code,
                ]);

                $user = User::create([
                    'name' => $this->name,
                    'email' => $this->email,
                    'phone' => $this->phone,
                    'password' => Hash::make('koverae'),
                    'is_active' => 1,
                ]);

                $superAdmin = 'Super Admin';

                // $user->assignRole($superAdmin);

                // Update user's team
                $user->team_id = $team->id;
                $user->save();
            }
            // Kover Compant
            $kompany = KoverCompany::create([
                'kover_id' => $kover->id,
                'name' => $this->company_name,
                'domain_name' => str()->slug($this->company_name),
                'website_url' => str()->slug($this->company_name).'.'. env('APP_DOMAIN'),
                'is_trial_mode' => true,
                'trial_ends_at' => now()->addDays(8),
            ]);
            $kompany->save();

            // Create the Team's companies
            $company = Company::create([
                'user_id' => $user->id,
                'name' => $this->company_name,
                // 'reference' => 'KOV',
                // 'company_address' => $this->company_address,
                'personal_company' => true,
                'domain_name' => $kompany->domain_name,
                'website_url' => $kompany->website_url,
                'enabled' => 1,
                // 'email' => 'contact@kover.koverae.com',
                // 'phone' => null, //+242065996409
                'address' => $this->company_address,
                'city' => $this->city,
                'country' => $this->country,
                'domain' => $this->industry,
                'size' => $this->size,
                'primary_interest' => $this->primary_interest,
                'default_currency' => $this->currency_code,
            ]);
            $company->save();

            $user->update([
                'company_id' => $company->id,
                'current_company_id' => $company->id
            ]);
            $user->save();

            $this->generateCompanyUrl($company->domain_name, $this->selectedApps, $company);
        });
    }

    public function choosePlan(){
        if($this->selectedApps == 1){
            return Plan::findByTag('standard');
        }elseif($this->selectedApps > 1){
            return Plan::findByTag('spark_yearly');
        }
    }

    public function generateCompanyUrl($companySlug, $selectedApps, $companyInfo){

        $apps = implode(',', $selectedApps); // Assuming $selectedApps is an array of app slugs
        // $companyInfoEncoded = implode(',', $companyInfo);
        // $companyInfoEncoded = encrypt($companyInfo); // Encrypt or hash the company info for security

        $url = "http://{$companySlug}".".".env('APP_DOMAIN')."/configure?apps={$apps}&company={$companyInfo->name}&u_id={$companyInfo->user_id}";


        return redirect()->away($url);
    }

    public function render()
    {
        // $currencies = Currency::all();
        return view('livewire.trial.app-selection');
    }

}
