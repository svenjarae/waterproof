@extends('layouts.app')

@section('content')

    <div class="sub_nav_container">
        <ul class="sub_nav">
            <li>
                <a class="active-sub" href="{{ route('service.index') }}">Service Offer</a>
            </li>
            <li>
                <a class="subnav-hover" href="{{ route('service.create') }}">Service Request</a>
            </li>
            <li>
                <a class="subnav-hover" href="{{ route('service.assignments') }}">Assignments</a>
            </li>
        </ul>
    </div>
    
    <div>
        <h2 class="headline_withNav">service</h2>
            
            <div class="subtext_container">
                <p>In order to always be up to date and to be able to offer the best service, we regularly take part in manufacturers' technical seminars. In this way, necessary changes / updates are recognized in good time and integrated into the service work.</p>
            </div>

        <div class="tabs-service_container">
            
            <div class="tab">
                <button class="tablinks special-hover" onclick="openTech(event, 'regulator')" id="defaultOpen">Regulator</button>
                <button class="tablinks special-hover" onclick="openTech(event, 'diveComputer')">Dive Computer</button>
                <button class="tablinks special-hover" onclick="openTech(event, 'jacket')">Jacket</button>
                <button class="tablinks special-hover" onclick="openTech(event, 'tank')">Tank</button>
                <button class="tablinks special-hover" onclick="openTech(event, 'drysuit')">Dry & wetsuit</button>
                <button class="tablinks special-hover" onclick="openTech(event, 'valves')">Cylinder valves</button>
                <button class="tablinks special-hover" onclick="openTech(event, 'abc')">Abc</button>
            </div>
            
            <div id="regulator" class="tabcontent">
                <div class="table-overflow_container">
                    <table class="service-table shadow">
                        <tr>
                            <th>Regulator service & repair</th>
                            <th>Price</th>
                        </tr>
                        
                        <tr>
                            <td>1st Stage Annual Service</td>
                            <td>$35</td>
                        </tr>
                        <tr>
                            <td>2nd Stage Annual Service</td>
                            <td>$25</td>
                        </tr>
                        <tr>
                            <td>1st & 2nd Stage Annual Service</td>
                            <td>$50</td>
                        </tr>
                        <tr>
                            <td>Alternate Inflator Annual Service</td>
                            <td>$25</td>
                        </tr>
                        <tr>
                            <td>Cleaning</td>
                            <td>$10</td>
                        </tr>
                        <tr>
                            <td>Entire maintenance</td>
                            <td>$60</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div id="diveComputer" class="tabcontent">
                <div class="table-overflow_container">
                    <table class="service-table shadow">
                        <tr>
                            <th>Dive computer service</th>
                            <th>Price</th>
                        </tr>
                        <tr>
                            <td>Explanation </td>
                            <td>$15</td>
                        </tr>
                        <tr>
                            <td>Battery exchange</td>
                            <td>$35</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div id="jacket" class="tabcontent">
                <div class="table-overflow_container">
                    <table class="service-table shadow">
                        <tr>
                            <th>BCD service</th>
                            <th>Price</th>
                        </tr>
                        <tr>
                            <td>Cleaning</td>
                            <td>$10</td>
                        </tr>
                        <tr>
                            <td>Cleaning, Inspection & Service</td>
                            <td>$25 (plus parts)</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div id="tank" class="tabcontent">
                <div class="table-overflow_container">
                    <table class="service-table shadow">
                        <tr>
                            <th>Tank & Air service</th>
                            <th>Price</th>
                        </tr>
                        <tr>
                            <td>Air fill</td>
                            <td>$7</td>
                        </tr>
                        <tr>
                            <td>Air fill over 3500 PSI</td>
                            <td>$14</td>
                        </tr>
                        <tr>
                            <td>Paintball Cylinder</td>
                            <td>$4</td>
                        </tr>
                        <tr>
                            <td>Paintball Air Fill Over 3500 PSI</td>
                            <td>$8</td>
                        </tr>
                        <tr>
                            <td>32% Enriched Air in a 80cf Cylinder or Smaller</td>
                            <td>$14</td>
                        </tr>
                        <tr>
                            <td>32% Enriched Air in a Cylinder Larger than 80cf</td>
                            <td>$22</td>
                        </tr>
                        <tr>
                            <td>Enriched Air Special Blend</td>
                            <td>$22</td>
                        </tr>
                        <tr>
                            <td>Enriched Air Special Blend Over 40%</td>
                            <td>$25</td>
                        </tr>
                        <tr>
                            <td>Avalanche Fill with an O-ring Service</td>
                            <td>$15</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div id="drysuit" class="tabcontent">
                <div class="table-overflow_container">
                    <table class="service-table shadow">
                        <tr>
                            <th>Dry- and wetsuit service</th>
                            <th>Price</th>
                        </tr>
                        
                        <tr>
                            <td>Drysuit Full Leak Test</td>
                            <td>$80</td>
                        </tr>
                        <tr>
                            <td>Leak Repairs (3 max)</td>
                            <td>$55</td>
                        </tr>
                        <tr>
                            <td>Neck Seal Replacement</td>
                            <td>$60</td>
                        </tr>
                        <tr>
                            <td>Neck Seal (Latex/Silicon)</td>
                            <td>$49-$60</td>
                        </tr>
                        <tr>
                            <td>Wrist Seal Replacement</td>
                            <td>$60</td>
                        </tr>
                        <tr>
                            <td>Wrist Seal Pair (Latex HD Bottle or Cone)</td>
                            <td>$48</td>
                        </tr>
                        <tr>
                            <td>Zipper Replacement</td>
                            <td>$150-$250</td>
                        </tr>
                        <tr>
                            <td>P-Valve Install</td>
                            <td>$75</td>
                        </tr>
                        <tr>
                            <td>Drysuit Cleaning</td>
                            <td>$80</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div id="valves" class="tabcontent">
                <div class="table-overflow_container">
                    <table class="service-table shadow">
                        <tr>
                            <th>Cylinder valves service & repair</th>
                            <th>Price</th>
                        </tr>
                        <tr>
                            <td>Visual inspection</td>
                            <td>20$</td>
                        </tr>
                        <tr>
                            <td>Hydrostatic Test</td>
                            <td>$38</td>
                        </tr>
                        <tr>
                            <td>Tumble/Rinse</td>
                            <td>$45</td>
                        </tr>
                        <tr>
                            <td>Doubles Disassemble and Reassemble</td>
                            <td>$40</td>
                        </tr>
                        <tr>
                            <td>Doubles Assembly only</td>
                            <td>$20</td>
                        </tr>
                        <tr>
                            <td>Oxygen cleaning</td>
                            <td>$25</td>
                        </tr>
                        <tr>
                            <td>Single Valve Rebuild & Oxygen Cleaning</td>
                            <td>$35</td>
                        </tr>
                        <tr>
                            <td>Doubles Manifold Rebuild & Oxygen Cleaning</td>
                            <td>$70</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div id="abc" class="tabcontent">
                <h3 class="tabs-headline">Abc</h3>
            </div>

        </div>
    </div>
    

@include('layouts.service')

@endsection
