@extends('admin::layouts.master')

@section('page_title')
    {{ __('twilio::package.sms.compose-a-sms') }} - Twilio
@stop

@section('content-wrapper')
<div class="content full-page adjacent-center">
    <div class="page-header">
        {{ Breadcrumbs::render('sms.compose') }}
        <div class="page-title">
            <h1>{{ __('twilio::package.sms.compose-a-sms') }}</h1>
        </div>
    </div>
    <div class="page-content">
        <sms-form></sms-form>
    </div>
</div>
@stop

@push('scripts')
<script type="text/x-template" id="sms-form-template">
    <form
            action="{{ route('admin.sms.store') }}"
            method="POST"
            enctype="multipart/form-data"
            @submit.prevent="onSubmit"
        >
            <div class="form-container">
                <div class="panel">
                    <div class="panel-header">
                        <button type="submit" class="btn btn-md btn-primary">
                            <i class="icon email-send-icon"></i>

                            {{ __('twilio::package.sms.send-sms') }}
                        </button>

                        <a href="{{ route('admin.sms.index') }}">{{ __('twilio::package.sms.go-back') }}</a>
                    </div>
    
                    <div class="panel-body">
                        @csrf()
                      
                        <div class="form-group" :class="[errors.has('to') ? 'has-error' : '']">
                            <label for="to" class="required">{{ __('twilio::package.sms.who-will-get-the-sms') }}</label>
    
                            <input type="text"
                                name="to"
                                placeholder="{{ __('twilio::package.sms.insert-to')}} "
                                class="control"
                                id="to"
                                value="{{ old('to') }}"
                                v-validate="'required'"
                                data-vv-as="{{ __('twilio::package.sms.to') }}"
                            />
    
                            <span class="control-error" v-if="errors.has('to')">
                                @{{ errors.first('to') }}
                            </span>
                        </div>

                        
                        <div class="form-group" :class="[errors.has('body') ? 'has-error' : '']">
                            <label for="body" class="required" style="margin-bottom: 10px">{{ __('twilio::package.sms.body') }}</label>

                            <textarea
                                name="body"
                                class="control"
                                id="body"
                                v-validate="'required|max:320'"
                                placeholder="{{  __('twilio::package.sms.insert-body') }}"
                                data-vv-as="{{  __('twilio::package.sms.body') }}"
                            >{{ old('body') }}</textarea>

                            <span class="control-error" v-if="errors.has('body')">
                                @{{ errors.first('body') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </script>

<script>
    Vue.component('sms-form', {
        template: '#sms-form-template',
        inject: ['$validator'],
        data: function() {
            return {
                // There is nothing for now...
            }
        },
        mounted: function() {
            var self = this;
        },
        methods: {
            onSubmit: function(e) {
                this.$root.onSubmit(e);
            }
        }
    });
</script>
@endpush