@component('mail::message')
# REMINDER!

The maintenace date of the following Equipment expires today.
<br> <br>
Waterproof advises you to have your equipment serviced as soon as possible!

@component('mail::table')
|Id        |Equipment Type|Brand    |Info|
|:---------|:-------------|:--------|:---|
@foreach($equipment as $singleEquipment)
| {{$singleEquipment['id']}}|{{$singleEquipment['equip_type']}}|{{$singleEquipment['brand']}}|{{$singleEquipment['info']}}|
@endforeach

@endcomponent


@component('mail::button', ['url' => '{{ $url }}', 'color' => 'primary'])
Make service request
@endcomponent

@component('mail::button', ['url' => '{{ $url }}', 'color' => 'orange'])
Contact
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
