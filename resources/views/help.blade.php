@extends('layouts.app')

@section('content')
    
    
    <h2 class="no-subnav_margin">how to</h2>

    <div class="tabs-service_container">
            
        <div class="tab">
            <button class="tablinks special-button" onclick="openTech(event, 'regulator')" id="defaultOpen">Get started</button>
            <button class="tablinks special-button" onclick="openTech(event, 'diveComputer')">Hand over your equipment</button>
            <button class="tablinks special-button" onclick="openTech(event, 'jacket')">Take care of your Equipment</button>
            <button class="tablinks special-button" onclick="openTech(event, 'tank')">Protect the Underwaterworld from my impact</button>
            <button class="tablinks special-button" onclick="openTech(event, 'drysuit')">contact us</button>
        </div>
            
        <div id="regulator" class="tabcontent">
            <h3 class="tabs-headline">Get started</h3>
        </div>

        <div id="diveComputer" class="tabcontent">
            <h3 class="tabs-headline">Hand over your equipment</h3>
        </div>

        <div id="jacket" class="tabcontent">
            <h3 class="tabs-headline">Take care of your Equipment</h3>
        </div>

        <div id="tank" class="tabcontent">
            <h3 class="tabs-headline">Protect the Ocean from my impact</h3>
        </div>

        <div id="drysuit" class="tabcontent">
            <h3 class="tabs-headline">contact us</h3>
        </div>

    </div>

@include('layouts.service')

@endsection

