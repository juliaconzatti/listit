@extends ('base.index')
@extends('components.darkmode')

@csrf


<ul>
    <li>Nome: {{$teste->nomedoitem}}</li>
</ul>

{{-- @foreach ($teste as $ts)

<p>
    {{ $ts->nomedoitem }}
</p>
@endforeach --}}