@extends('layouts.index')

@section('container')
 
<livewire:navbar />
<div class="mb-16"></div>

<livewire:lab-schedule :lab="$lab" />


@endsection