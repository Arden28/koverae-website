@extends('layouts.app')

@section('page_title', "Work Address")

@section('content')
<div id="hero" style="height: 1px;">

</div>
<div class="text-black container-md w-100">
    <header class="mb-2 text-left border-bottom">
        <h3><a href="{{ route('profile.edit') }}"><i class="bi bi-arrow-left-circle"></i></a> {{ __('Work Address') }}</h3>
    </header>
    <section class="p-lg-3">
        <form class="container p-3 rounded k-form" method="post" action="{{ route('profile.update.work-address') }}">
            @csrf
            @method('patch')

            <span class="message">{{ __('Your home and work addresses are used to personalize your experience on Koverae products and show you more relevant suggestions. You can delete them at any time.') }}</span>

            <h6 class="mt-3">{{ __('Your work Address') }}</h6>
            <div class="mb-3 row">
                <div class="mt-1 mb-1 col-6">
                        <label for="country" class="m-0">{{ __('Country') }}</label>
                        <select id="country" name="country" class="form-control">
                            <option value="" selected disabled>Select a country</option>
                            <option value="Afghanistan" {{ $address->country == 'Afghanistan' ? 'selected' : '' }}>Afghanistan</option>
                            <option value="Åland Islands" {{ $address->country == 'Åland Islands' ? 'selected' : '' }}>Åland Islands</option>
                            <option value="Albania" {{ $address->country == 'Albania' ? 'selected' : '' }}>Albania</option>
                            <option value="Algeria" {{ $address->country == 'Algeria' ? 'selected' : '' }}>Algeria</option>
                            <option value="American Samoa" {{ $address->country == 'American Samoa' ? 'selected' : '' }}>American Samoa</option>
                            <option value="Andorra" {{ $address->country == 'Andorra' ? 'selected' : '' }}>Andorra</option>
                            <option value="Angola" {{ $address->country == 'Angola' ? 'selected' : '' }}>Angola</option>
                            <option value="Anguilla" {{ $address->country == 'Anguilla' ? 'selected' : '' }}>Anguilla</option>
                            <option value="Antarctica" {{ $address->country == 'Antarctica' ? 'selected' : '' }}>Antarctica</option>
                            <option value="Antigua and Barbuda" {{ $address->country == 'Antigua and Barbuda' ? 'selected' : '' }}>Antigua and Barbuda</option>
                            <option value="Argentina" {{ $address->country == 'Argentina' ? 'selected' : '' }}>Argentina</option>
                            <option value="Armenia" {{ $address->country == 'Armenia' ? 'selected' : '' }}>Armenia</option>
                            <option value="Aruba" {{ $address->country == 'Aruba' ? 'selected' : '' }}>Aruba</option>
                            <option value="Australia" {{ $address->country == 'Australia' ? 'selected' : '' }}>Australia</option>
                            <option value="Austria" {{ $address->country == 'Austria' ? 'selected' : '' }}>Austria</option>
                            <option value="Azerbaijan" {{ $address->country == 'Azerbaijan' ? 'selected' : '' }}>Azerbaijan</option>
                            <option value="Bahamas" {{ $address->country == 'Bahamas' ? 'selected' : '' }}>Bahamas</option>
                            <option value="Bahrain" {{ $address->country == 'Bahrain' ? 'selected' : '' }}>Bahrain</option>
                            <option value="Bangladesh" {{ $address->country == 'Bangladesh' ? 'selected' : '' }}>Bangladesh</option>
                            <option value="Barbados" {{ $address->country == 'Barbados' ? 'selected' : '' }}>Barbados</option>
                            <option value="Belarus" {{ $address->country == 'Belarus' ? 'selected' : '' }}>Belarus</option>
                            <option value="Belgium" {{ $address->country == 'Belgium' ? 'selected' : '' }}>Belgium</option>
                            <option value="Belize" {{ $address->country == 'Belize' ? 'selected' : '' }}>Belize</option>
                            <option value="Benin" {{ $address->country == 'Benin' ? 'selected' : '' }}>Benin</option>
                            <option value="Bermuda" {{ $address->country == 'Bermuda' ? 'selected' : '' }}>Bermuda</option>
                            <option value="Bhutan" {{ $address->country == 'Bhutan' ? 'selected' : '' }}>Bhutan</option>
                            <option value="Bolivia" {{ $address->country == 'Bolivia' ? 'selected' : '' }}>Bolivia</option>
                            <option value="Bosnia and Herzegovina" {{ $address->country == 'Bosnia and Herzegovina' ? 'selected' : '' }}>Bosnia and Herzegovina</option>
                            <option value="Botswana" {{ $address->country == 'Botswana' ? 'selected' : '' }}>Botswana</option>
                            <option value="Bouvet Island" {{ $address->country == 'Bouvet Island' ? 'selected' : '' }}>Bouvet Island</option>
                            <option value="Brazil" {{ $address->country == 'Brazil' ? 'selected' : '' }}>Brazil</option>
                            <option value="British Indian Ocean Territory" {{ $address->country == 'British Indian Ocean Territory' ? 'selected' : '' }}>British Indian Ocean Territory</option>
                            <option value="Brunei Darussalam" {{ $address->country == 'Brunei Darussalam' ? 'selected' : '' }}>Brunei Darussalam</option>
                            <option value="Bulgaria" {{ $address->country == 'Bulgaria' ? 'selected' : '' }}>Bulgaria</option>
                            <option value="Burkina Faso" {{ $address->country == 'Burkina Faso' ? 'selected' : '' }}>Burkina Faso</option>
                            <option value="Burundi" {{ $address->country == 'Burundi' ? 'selected' : '' }}>Burundi</option>
                            <option value="Cambodia" {{ $address->country == 'Cambodia' ? 'selected' : '' }}>Cambodia</option>
                            <option value="Cameroon" {{ $address->country == 'Cameroon' ? 'selected' : '' }}>Cameroon</option>
                            <option value="Canada" {{ $address->country == 'Canada' ? 'selected' : '' }}>Canada</option>
                            <option value="Cape Verde" {{ $address->country == 'Cape Verde' ? 'selected' : '' }}>Cape Verde</option>
                            <option value="Cayman Islands" {{ $address->country == 'Cayman Islands' ? 'selected' : '' }}>Cayman Islands</option>
                            <option value="Central African Republic" {{ $address->country == 'Central African Republic' ? 'selected' : '' }}>Central African Republic</option>
                            <option value="Chad" {{ $address->country == 'Chad' ? 'selected' : '' }}>Chad</option>
                            <option value="Chile" {{ $address->country == 'Chile' ? 'selected' : '' }}>Chile</option>
                            <option value="China" {{ $address->country == 'China' ? 'selected' : '' }}>China</option>
                            <option value="Christmas Island" {{ $address->country == 'Christmas Island' ? 'selected' : '' }}>Christmas Island</option>
                            <option value="Cocos (Keeling) Islands" {{ $address->country == 'Cocos (Keeling) Islands' ? 'selected' : '' }}>Cocos (Keeling) Islands</option>
                            <option value="Colombia" {{ $address->country == 'Colombia' ? 'selected' : '' }}>Colombia</option>
                            <option value="Comoros" {{ $address->country == 'Comoros' ? 'selected' : '' }}>Comoros</option>
                            <option value="Congo" {{ $address->country == 'Congo' ? 'selected' : '' }}>Congo</option>
                            <option value="Congo, The Democratic Republic of The" {{ $address->country == 'Congo, The Democratic Republic of The' ? 'selected' : '' }}>Congo, The Democratic Republic of The</option>
                            <option value="Cook Islands" {{ $address->country == 'Cook Islands' ? 'selected' : '' }}>Cook Islands</option>
                            <option value="Costa Rica" {{ $address->country == 'Costa Rica' ? 'selected' : '' }}>Costa Rica</option>
                            <option value="Cote D'ivoire" {{ $address->country == 'Cote D\'ivoire' ? 'selected' : '' }}>Cote D'ivoire</option>
                            <option value="Croatia" {{ $address->country == 'Croatia' ? 'selected' : '' }}>Croatia</option>
                            <option value="Cuba" {{ $address->country == 'Cuba' ? 'selected' : '' }}>Cuba</option>
                            <option value="Cyprus" {{ $address->country == 'Cyprus' ? 'selected' : '' }}>Cyprus</option>
                            <option value="Czech Republic" {{ $address->country == 'Czech Republic' ? 'selected' : '' }}>Czech Republic</option>
                            <option value="Denmark" {{ $address->country == 'Denmark' ? 'selected' : '' }}>Denmark</option>
                            <option value="Djibouti" {{ $address->country == 'Djibouti' ? 'selected' : '' }}>Djibouti</option>
                            <option value="Dominica" {{ $address->country == 'Dominica' ? 'selected' : '' }}>Dominica</option>
                            <option value="Dominican Republic" {{ $address->country == 'Dominican Republic' ? 'selected' : '' }}>Dominican Republic</option>
                            <option value="Ecuador" {{ $address->country == 'Ecuador' ? 'selected' : '' }}>Ecuador</option>
                            <option value="Egypt" {{ $address->country == 'Egypt' ? 'selected' : '' }}>Egypt</option>
                            <option value="El Salvador" {{ $address->country == 'El Salvador' ? 'selected' : '' }}>El Salvador</option>
                            <option value="Equatorial Guinea" {{ $address->country == 'Equatorial Guinea' ? 'selected' : '' }}>Equatorial Guinea</option>
                            <option value="Eritrea" {{ $address->country == 'Eritrea' ? 'selected' : '' }}>Eritrea</option>
                            <option value="Estonia" {{ $address->country == 'Estonia' ? 'selected' : '' }}>Estonia</option>
                            <option value="Ethiopia" {{ $address->country == 'Ethiopia' ? 'selected' : '' }}>Ethiopia</option>
                            <option value="Falkland Islands (Malvinas)" {{ $address->country == 'Falkland Islands (Malvinas)' ? 'selected' : '' }}>Falkland Islands (Malvinas)</option>
                            <option value="Faroe Islands" {{ $address->country == 'Faroe Islands' ? 'selected' : '' }}>Faroe Islands</option>
                            <option value="Fiji" {{ $address->country == 'Fiji' ? 'selected' : '' }}>Fiji</option>
                            <option value="Finland" {{ $address->country == 'Finland' ? 'selected' : '' }}>Finland</option>
                            <option value="France" {{ $address->country == 'France' ? 'selected' : '' }}>France</option>
                            <option value="French Guiana" {{ $address->country == 'French Guiana' ? 'selected' : '' }}>French Guiana</option>
                            <option value="French Polynesia" {{ $address->country == 'French Polynesia' ? 'selected' : '' }}>French Polynesia</option>
                            <option value="French Southern Territories" {{ $address->country == 'French Southern Territories' ? 'selected' : '' }}>French Southern Territories</option>
                            <option value="Gabon" {{ $address->country == 'Gabon' ? 'selected' : '' }}>Gabon</option>
                            <option value="Gambia" {{ $address->country == 'Gambia' ? 'selected' : '' }}>Gambia</option>
                            <option value="Georgia" {{ $address->country == 'Georgia' ? 'selected' : '' }}>Georgia</option>
                            <option value="Germany" {{ $address->country == 'Germany' ? 'selected' : '' }}>Germany</option>
                            <option value="Ghana" {{ $address->country == 'Ghana' ? 'selected' : '' }}>Ghana</option>
                            <option value="Gibraltar" {{ $address->country == 'Gibraltar' ? 'selected' : '' }}>Gibraltar</option>
                            <option value="Greece" {{ $address->country == 'Greece' ? 'selected' : '' }}>Greece</option>
                            <option value="Greenland" {{ $address->country == 'Greenland' ? 'selected' : '' }}>Greenland</option>
                            <option value="Grenada" {{ $address->country == 'Grenada' ? 'selected' : '' }}>Grenada</option>
                            <option value="Guadeloupe" {{ $address->country == 'Guadeloupe' ? 'selected' : '' }}>Guadeloupe</option>
                            <option value="Guam" {{ $address->country == 'Guam' ? 'selected' : '' }}>Guam</option>
                            <option value="Guatemala" {{ $address->country == 'Guatemala' ? 'selected' : '' }}>Guatemala</option>
                            <option value="Guernsey" {{ $address->country == 'Guernsey' ? 'selected' : '' }}>Guernsey</option>
                            <option value="Guinea" {{ $address->country == 'Guinea' ? 'selected' : '' }}>Guinea</option>
                            <option value="Guinea-bissau" {{ $address->country == 'Guinea-bissau' ? 'selected' : '' }}>Guinea-bissau</option>
                            <option value="Guyana" {{ $address->country == 'Guyana' ? 'selected' : '' }}>Guyana</option>
                            <option value="Haiti" {{ $address->country == 'Haiti' ? 'selected' : '' }}>Haiti</option>
                            <option value="Heard Island and Mcdonald Islands" {{ $address->country == 'Heard Island and Mcdonald Islands' ? 'selected' : '' }}>Heard Island and Mcdonald Islands</option>
                            <option value="Holy See (Vatican City State)" {{ $address->country == 'Holy See (Vatican City State)' ? 'selected' : '' }}>Holy See (Vatican City State)</option>
                            <option value="Honduras" {{ $address->country == 'Honduras' ? 'selected' : '' }}>Honduras</option>
                            <option value="Hong Kong" {{ $address->country == 'Hong Kong' ? 'selected' : '' }}>Hong Kong</option>
                            <option value="Hungary" {{ $address->country == 'Hungary' ? 'selected' : '' }}>Hungary</option>
                            <option value="Iceland" {{ $address->country == 'Iceland' ? 'selected' : '' }}>Iceland</option>
                            <option value="India" {{ $address->country == 'India' ? 'selected' : '' }}>India</option>
                            <option value="Indonesia" {{ $address->country == 'Indonesia' ? 'selected' : '' }}>Indonesia</option>
                            <option value="Iran, Islamic Republic of" {{ $address->country == 'Iran, Islamic Republic of' ? 'selected' : '' }}>Iran, Islamic Republic of</option>
                            <option value="Iraq" {{ $address->country == 'Iraq' ? 'selected' : '' }}>Iraq</option>
                            <option value="Ireland" {{ $address->country == 'Ireland' ? 'selected' : '' }}>Ireland</option>
                            <option value="Isle of Man" {{ $address->country == 'Isle of Man' ? 'selected' : '' }}>Isle of Man</option>
                            <option value="Israel" {{ $address->country == 'Israel' ? 'selected' : '' }}>Israel</option>
                            <option value="Italy" {{ $address->country == 'Italy' ? 'selected' : '' }}>Italy</option>
                            <option value="Jamaica" {{ $address->country == 'Jamaica' ? 'selected' : '' }}>Jamaica</option>
                            <option value="Japan" {{ $address->country == 'Japan' ? 'selected' : '' }}>Japan</option>
                            <option value="Jersey" {{ $address->country == 'Jersey' ? 'selected' : '' }}>Jersey</option>
                            <option value="Jordan" {{ $address->country == 'Jordan' ? 'selected' : '' }}>Jordan</option>
                            <option value="Kazakhstan" {{ $address->country == 'Kazakhstan' ? 'selected' : '' }}>Kazakhstan</option>
                            <option value="Kenya" {{ $address->country == 'Kenya' ? 'selected' : '' }}>Kenya</option>
                            <option value="Kiribati" {{ $address->country == 'Kiribati' ? 'selected' : '' }}>Kiribati</option>
                            <option value="Korea, Democratic People's Republic of" {{ $address->country == 'Korea, Democratic People\'s Republic of' ? 'selected' : '' }}>Korea, Democratic People's Republic of</option>
                            <option value="Korea, Republic of" {{ $address->country == 'Korea, Republic of' ? 'selected' : '' }}>Korea, Republic of</option>
                            <option value="Kuwait" {{ $address->country == 'Kuwait' ? 'selected' : '' }}>Kuwait</option>
                            <option value="Kyrgyzstan" {{ $address->country == 'Kyrgyzstan' ? 'selected' : '' }}>Kyrgyzstan</option>
                            <option value="Lao People's Democratic Republic" {{ $address->country == 'Lao People\'s Democratic Republic' ? 'selected' : '' }}>Lao People's Democratic Republic</option>
                            <option value="Latvia" {{ $address->country == 'Latvia' ? 'selected' : '' }}>Latvia</option>
                            <option value="Lebanon" {{ $address->country == 'Lebanon' ? 'selected' : '' }}>Lebanon</option>
                            <option value="Lesotho" {{ $address->country == 'Lesotho' ? 'selected' : '' }}>Lesotho</option>
                            <option value="Liberia" {{ $address->country == 'Liberia' ? 'selected' : '' }}>Liberia</option>
                            <option value="Libyan Arab Jamahiriya" {{ $address->country == 'Libyan Arab Jamahiriya' ? 'selected' : '' }}>Libyan Arab Jamahiriya</option>
                            <option value="Liechtenstein" {{ $address->country == 'Liechtenstein' ? 'selected' : '' }}>Liechtenstein</option>
                            <option value="Lithuania" {{ $address->country == 'Lithuania' ? 'selected' : '' }}>Lithuania</option>
                            <option value="Luxembourg" {{ $address->country == 'Luxembourg' ? 'selected' : '' }}>Luxembourg</option>
                            <option value="Macao" {{ $address->country == 'Macao' ? 'selected' : '' }}>Macao</option>
                            <option value="Macedonia, The Former Yugoslav Republic of" {{ $address->country == 'Macedonia, The Former Yugoslav Republic of' ? 'selected' : '' }}>Macedonia, The Former Yugoslav Republic of</option>
                            <option value="Madagascar" {{ $address->country == 'Madagascar' ? 'selected' : '' }}>Madagascar</option>
                            <option value="Malawi" {{ $address->country == 'Malawi' ? 'selected' : '' }}>Malawi</option>
                            <option value="Malaysia" {{ $address->country == 'Malaysia' ? 'selected' : '' }}>Malaysia</option>
                            <option value="Maldives" {{ $address->country == 'Maldives' ? 'selected' : '' }}>Maldives</option>
                            <option value="Mali" {{ $address->country == 'Mali' ? 'selected' : '' }}>Mali</option>
                            <option value="Malta" {{ $address->country == 'Malta' ? 'selected' : '' }}>Malta</option>
                            <option value="Marshall Islands" {{ $address->country == 'Marshall Islands' ? 'selected' : '' }}>Marshall Islands</option>
                            <option value="Martinique" {{ $address->country == 'Martinique' ? 'selected' : '' }}>Martinique</option>
                            <option value="Mauritania" {{ $address->country == 'Mauritania' ? 'selected' : '' }}>Mauritania</option>
                            <option value="Mauritius" {{ $address->country == 'Mauritius' ? 'selected' : '' }}>Mauritius</option>
                            <option value="Mayotte" {{ $address->country == 'Mayotte' ? 'selected' : '' }}>Mayotte</option>
                            <option value="Mexico" {{ $address->country == 'Mexico' ? 'selected' : '' }}>Mexico</option>
                            <option value="Micronesia, Federated States of" {{ $address->country == 'Micronesia, Federated States of' ? 'selected' : '' }}>Micronesia, Federated States of</option>
                            <option value="Moldova, Republic of" {{ $address->country == 'Moldova, Republic of' ? 'selected' : '' }}>Moldova, Republic of</option>
                            <option value="Monaco" {{ $address->country == 'Monaco' ? 'selected' : '' }}>Monaco</option>
                            <option value="Mongolia" {{ $address->country == 'Mongolia' ? 'selected' : '' }}>Mongolia</option>
                            <option value="Montenegro" {{ $address->country == 'Montenegro' ? 'selected' : '' }}>Montenegro</option>
                            <option value="Montserrat" {{ $address->country == 'Montserrat' ? 'selected' : '' }}>Montserrat</option>
                            <option value="Morocco" {{ $address->country == 'Morocco' ? 'selected' : '' }}>Morocco</option>
                            <option value="Mozambique" {{ $address->country == 'Mozambique' ? 'selected' : '' }}>Mozambique</option>
                            <option value="Myanmar" {{ $address->country == 'Myanmar' ? 'selected' : '' }}>Myanmar</option>
                            <option value="Namibia" {{ $address->country == 'Namibia' ? 'selected' : '' }}>Namibia</option>
                            <option value="Nauru" {{ $address->country == 'Nauru' ? 'selected' : '' }}>Nauru</option>
                            <option value="Nepal" {{ $address->country == 'Nepal' ? 'selected' : '' }}>Nepal</option>
                            <option value="Netherlands" {{ $address->country == 'Netherlands' ? 'selected' : '' }}>Netherlands</option>
                            <option value="Netherlands Antilles" {{ $address->country == 'Netherlands Antilles' ? 'selected' : '' }}>Netherlands Antilles</option>
                            <option value="New Caledonia" {{ $address->country == 'New Caledonia' ? 'selected' : '' }}>New Caledonia</option>
                            <option value="New Zealand" {{ $address->country == 'New Zealand' ? 'selected' : '' }}>New Zealand</option>
                            <option value="Nicaragua" {{ $address->country == 'Nicaragua' ? 'selected' : '' }}>Nicaragua</option>
                            <option value="Niger" {{ $address->country == 'Niger' ? 'selected' : '' }}>Niger</option>
                            <option value="Nigeria" {{ $address->country == 'Nigeria' ? 'selected' : '' }}>Nigeria</option>
                            <option value="Niue" {{ $address->country == 'Niue' ? 'selected' : '' }}>Niue</option>
                            <option value="Norfolk Island" {{ $address->country == 'Norfolk Island' ? 'selected' : '' }}>Norfolk Island</option>
                            <option value="Northern Mariana Islands" {{ $address->country == 'Northern Mariana Islands' ? 'selected' : '' }}>Northern Mariana Islands</option>
                            <option value="Norway" {{ $address->country == 'Norway' ? 'selected' : '' }}>Norway</option>
                            <option value="Oman" {{ $address->country == 'Oman' ? 'selected' : '' }}>Oman</option>
                            <option value="Pakistan" {{ $address->country == 'Pakistan' ? 'selected' : '' }}>Pakistan</option>
                            <option value="Palau" {{ $address->country == 'Palau' ? 'selected' : '' }}>Palau</option>
                            <option value="Palestinian Territory, Occupied" {{ $address->country == 'Palestinian Territory, Occupied' ? 'selected' : '' }}>Palestinian Territory, Occupied</option>
                            <option value="Panama" {{ $address->country == 'Panama' ? 'selected' : '' }}>Panama</option>
                            <option value="Papua New Guinea" {{ $address->country == 'Papua New Guinea' ? 'selected' : '' }}>Papua New Guinea</option>
                            <option value="Paraguay" {{ $address->country == 'Paraguay' ? 'selected' : '' }}>Paraguay</option>
                            <option value="Peru" {{ $address->country == 'Peru' ? 'selected' : '' }}>Peru</option>
                            <option value="Philippines" {{ $address->country == 'Philippines' ? 'selected' : '' }}>Philippines</option>
                            <option value="Pitcairn" {{ $address->country == 'Pitcairn' ? 'selected' : '' }}>Pitcairn</option>
                            <option value="Poland" {{ $address->country == 'Poland' ? 'selected' : '' }}>Poland</option>
                            <option value="Portugal" {{ $address->country == 'Portugal' ? 'selected' : '' }}>Portugal</option>
                            <option value="Puerto Rico" {{ $address->country == 'Puerto Rico' ? 'selected' : '' }}>Puerto Rico</option>
                            <option value="Qatar" {{ $address->country == 'Qatar' ? 'selected' : '' }}>Qatar</option>
                            <option value="Reunion" {{ $address->country == 'Reunion' ? 'selected' : '' }}>Reunion</option>
                            <option value="Romania" {{ $address->country == 'Romania' ? 'selected' : '' }}>Romania</option>
                            <option value="Russian Federation" {{ $address->country == 'Russian Federation' ? 'selected' : '' }}>Russian Federation</option>
                            <option value="Rwanda" {{ $address->country == 'Rwanda' ? 'selected' : '' }}>Rwanda</option>
                            <option value="Saint Helena" {{ $address->country == 'Saint Helena' ? 'selected' : '' }}>Saint Helena</option>
                            <option value="Saint Kitts and Nevis" {{ $address->country == 'Saint Kitts and Nevis' ? 'selected' : '' }}>Saint Kitts and Nevis</option>
                            <option value="Saint Lucia" {{ $address->country == 'Saint Lucia' ? 'selected' : '' }}>Saint Lucia</option>
                            <option value="Saint Pierre and Miquelon" {{ $address->country == 'Saint Pierre and Miquelon' ? 'selected' : '' }}>Saint Pierre and Miquelon</option>
                            <option value="Saint Vincent and The Grenadines" {{ $address->country == 'Saint Vincent and The Grenadines' ? 'selected' : '' }}>Saint Vincent and The Grenadines</option>
                            <option value="Samoa" {{ $address->country == 'Samoa' ? 'selected' : '' }}>Samoa</option>
                            <option value="San Marino" {{ $address->country == 'San Marino' ? 'selected' : '' }}>San Marino</option>
                            <option value="Sao Tome and Principe" {{ $address->country == 'Sao Tome and Principe' ? 'selected' : '' }}>Sao Tome and Principe</option>
                            <option value="Saudi Arabia" {{ $address->country == 'Saudi Arabia' ? 'selected' : '' }}>Saudi Arabia</option>
                            <option value="Senegal" {{ $address->country == 'Senegal' ? 'selected' : '' }}>Senegal</option>
                            <option value="Serbia" {{ $address->country == 'Serbia' ? 'selected' : '' }}>Serbia</option>
                            <option value="Seychelles" {{ $address->country == 'Seychelles' ? 'selected' : '' }}>Seychelles</option>
                            <option value="Sierra Leone" {{ $address->country == 'Sierra Leone' ? 'selected' : '' }}>Sierra Leone</option>
                            <option value="Singapore" {{ $address->country == 'Singapore' ? 'selected' : '' }}>Singapore</option>
                            <option value="Slovakia" {{ $address->country == 'Slovakia' ? 'selected' : '' }}>Slovakia</option>
                            <option value="Slovenia" {{ $address->country == 'Slovenia' ? 'selected' : '' }}>Slovenia</option>
                            <option value="Solomon Islands" {{ $address->country == 'Solomon Islands' ? 'selected' : '' }}>Solomon Islands</option>
                            <option value="Somalia" {{ $address->country == 'Somalia' ? 'selected' : '' }}>Somalia</option>
                            <option value="South Africa" {{ $address->country == 'South Africa' ? 'selected' : '' }}>South Africa</option>
                            <option value="South Georgia and The South Sandwich Islands" {{ $address->country == 'South Georgia and The South Sandwich Islands' ? 'selected' : '' }}>South Georgia and The South Sandwich Islands</option>
                            <option value="Spain" {{ $address->country == 'Spain' ? 'selected' : '' }}>Spain</option>
                            <option value="Sri Lanka" {{ $address->country == 'Sri Lanka' ? 'selected' : '' }}>Sri Lanka</option>
                            <option value="Sudan" {{ $address->country == 'Sudan' ? 'selected' : '' }}>Sudan</option>
                            <option value="Suriname" {{ $address->country == 'Suriname' ? 'selected' : '' }}>Suriname</option>
                            <option value="Svalbard and Jan Mayen" {{ $address->country == 'Svalbard and Jan Mayen' ? 'selected' : '' }}>Svalbard and Jan Mayen</option>
                            <option value="Swaziland" {{ $address->country == 'Swaziland' ? 'selected' : '' }}>Swaziland</option>
                            <option value="Sweden" {{ $address->country == 'Sweden' ? 'selected' : '' }}>Sweden</option>
                            <option value="Switzerland" {{ $address->country == 'Switzerland' ? 'selected' : '' }}>Switzerland</option>
                            <option value="Syrian Arab Republic" {{ $address->country == 'Syrian Arab Republic' ? 'selected' : '' }}>Syrian Arab Republic</option>
                            <option value="Taiwan" {{ $address->country == 'Taiwan' ? 'selected' : '' }}>Taiwan</option>
                            <option value="Tajikistan" {{ $address->country == 'Tajikistan' ? 'selected' : '' }}>Tajikistan</option>
                            <option value="Tanzania, United Republic of" {{ $address->country == 'Tanzania, United Republic of' ? 'selected' : '' }}>Tanzania, United Republic of</option>
                            <option value="Thailand" {{ $address->country == 'Thailand' ? 'selected' : '' }}>Thailand</option>
                            <option value="Timor-leste" {{ $address->country == 'Timor-leste' ? 'selected' : '' }}>Timor-leste</option>
                            <option value="Togo" {{ $address->country == 'Togo' ? 'selected' : '' }}>Togo</option>
                            <option value="Tokelau" {{ $address->country == 'Tokelau' ? 'selected' : '' }}>Tokelau</option>
                            <option value="Tonga" {{ $address->country == 'Tonga' ? 'selected' : '' }}>Tonga</option>
                            <option value="Trinidad and Tobago" {{ $address->country == 'Trinidad and Tobago' ? 'selected' : '' }}>Trinidad and Tobago</option>
                            <option value="Tunisia" {{ $address->country == 'Tunisia' ? 'selected' : '' }}>Tunisia</option>
                            <option value="Turkey" {{ $address->country == 'Turkey' ? 'selected' : '' }}>Turkey</option>
                            <option value="Turkmenistan" {{ $address->country == 'Turkmenistan' ? 'selected' : '' }}>Turkmenistan</option>
                            <option value="Turks and Caicos Islands" {{ $address->country == 'Turks and Caicos Islands' ? 'selected' : '' }}>Turks and Caicos Islands</option>
                            <option value="Tuvalu" {{ $address->country == 'Tuvalu' ? 'selected' : '' }}>Tuvalu</option>
                            <option value="Uganda" {{ $address->country == 'Uganda' ? 'selected' : '' }}>Uganda</option>
                            <option value="Ukraine" {{ $address->country == 'Ukraine' ? 'selected' : '' }}>Ukraine</option>
                            <option value="United Arab Emirates" {{ $address->country == 'United Arab Emirates' ? 'selected' : '' }}>United Arab Emirates</option>
                            <option value="United Kingdom" {{ $address->country == 'United Kingdom' ? 'selected' : '' }}>United Kingdom</option>
                            <option value="United States" {{ $address->country == 'United States' ? 'selected' : '' }}>United States</option>
                            <option value="United States Minor Outlying Islands" {{ $address->country == 'United States Minor Outlying Islands' ? 'selected' : '' }}>United States Minor Outlying Islands</option>
                            <option value="Uruguay" {{ $address->country == 'Uruguay' ? 'selected' : '' }}>Uruguay</option>
                            <option value="Uzbekistan" {{ $address->country == 'Uzbekistan' ? 'selected' : '' }}>Uzbekistan</option>
                            <option value="Vanuatu" {{ $address->country == 'Vanuatu' ? 'selected' : '' }}>Vanuatu</option>
                            <option value="Venezuela" {{ $address->country == 'Venezuela' ? 'selected' : '' }}>Venezuela</option>
                            <option value="Viet Nam" {{ $address->country == 'Viet Nam' ? 'selected' : '' }}>Viet Nam</option>
                            <option value="Virgin Islands, British" {{ $address->country == 'Virgin Islands, British' ? 'selected' : '' }}>Virgin Islands, British</option>
                            <option value="Virgin Islands, U.S." {{ $address->country == 'Virgin Islands, U.S.' ? 'selected' : '' }}>Virgin Islands, U.S.</option>
                            <option value="Wallis and Futuna" {{ $address->country == 'Wallis and Futuna' ? 'selected' : '' }}>Wallis and Futuna</option>
                            <option value="Western Sahara" {{ $address->country == 'Western Sahara' ? 'selected' : '' }}>Western Sahara</option>
                            <option value="Yemen" {{ $address->country == 'Yemen' ? 'selected' : '' }}>Yemen</option>
                            <option value="Zambia" {{ $address->country == 'Zambia' ? 'selected' : '' }}>Zambia</option>
                            <option value="Zimbabwe" {{ $address->country == 'Zimbabwe' ? 'selected' : '' }}>Zimbabwe</option>
                        </select>
                    <x-input-error :messages="$errors->get('country')" class="mt-2" />
                </div>
                <div class="mt-1 mb-1 col-6">
                    <label for="region" class="m-0">{{ __('State / Region') }}</label>
                    <input type="tel" name="region" class="form-control" id="region" value="{{ $address->region }}">
                    <x-input-error :messages="$errors->get('region')" class="mt-2" />
                </div>
                <div class="mt-1 mb-1 col-6">
                    <label for="city" class="m-0">{{ __('City') }}</label>
                    <input type="tel" name="city" class="form-control" id="city" value="{{ $address->city }}">
                    <x-input-error :messages="$errors->get('city')" class="mt-2" />
                </div>
                <div class="mt-1 mb-1 col-6">
                    <label for="zip" class="m-0">{{ __('Postal Code') }}</label>
                    <input type="tel" name="zip" class="form-control" id="zip" value="{{ $address->zip }}">
                    <x-input-error :messages="$errors->get('zip')" class="mt-2" />
                </div>
                <div class="mt-1 mb-1 col-12">
                    <label for="street" class="m-0">{{ __('Street') }}</label>
                    <input type="tel" name="street" class="form-control" id="street" value="{{ $address->street }}">
                    <x-input-error :messages="$errors->get('street')" class="mt-2" />
                </div>
            </div>

            <div class="help">
                <h6 class="">{{ __('Who can see your addresses') }}</h6>
                <div class="gap-1 d-flex">
                    <span class="help-icon"><i class="bi bi-shield-lock"></i></span>
                    <p>{{ __('This information is private. Only you can see it.') }}</p>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('profile.edit') }}" class="p-2 text-decoration-none"><span class="m-2">{{ __('Cancel') }}</span></a>
                <button class="rounded btn btn-primary font-weight-bold" type="submit">
                    {{ __('Save') }}
                </button>
            </div>
        </form>
    </section>
</div>
@endsection
