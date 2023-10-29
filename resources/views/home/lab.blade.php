@extends('layouts.index')

@section('container')
 
<livewire:navbar />

<livewire:lab-schedule :lab="$lab" />


@endsection