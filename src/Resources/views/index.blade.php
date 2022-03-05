@extends('admin::layouts.master')

@section('page_title')
    {{ __('twilio::package.sms.listing') }}
@stop

@section('content-wrapper')
    <div class="content full-page">
        <table-component data-src="{{ route('admin.sms.index') }}">
            <template v-slot:table-header>
                <h1>
                    {!! view_render_event('admin.sms.index.header.before') !!}

                    {{ Breadcrumbs::render('sms') }}

                    {{ __('twilio::package.sms.outbox') }}

                    {!! view_render_event('admin.sms.index.header.after') !!}
                </h1>
            </template>
        <table-component>
    </div>
@stop
