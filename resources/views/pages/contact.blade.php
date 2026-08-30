@extends('layouts.app')

@section('title', __('pages.contact.meta_title'))

@section('content')

<x-ui.contact.hero />

<x-ui.contact.communication-flow />

<x-ui.contact.conversation-terminal />

<x-ui.footer />
   
@endsection
 