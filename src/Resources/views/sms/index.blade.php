@extends('admin::layouts.master')

@section('page_title')
    {{ __('twilio::package.sms.listing') }}
@stop

@section('content-wrapper')
    <div class="content full-page">
        <table-component data-src="{{ route('admin.twilio.sms.index') }}">
            <template v-slot:table-header>
                <h1>
                    {!! view_render_event('admin.sms.index.header.before') !!}

                    {{ Breadcrumbs::render('sms') }}

                    {{ __('twilio::package.sms.outbox') }}

                    {!! view_render_event('admin.sms.index.header.after') !!}
                </h1>
            </template>
            @if (bouncer()->hasPermission('twilio.sms.create'))
                <template v-slot:table-action>
                    <a href="{{ route('admin.twilio.sms.create') }}" class="btn btn-md btn-primary">{{ __('twilio::package.sms.compose') }}</a>
                </template>
            @endif
        <table-component>
    </div>
@stop
