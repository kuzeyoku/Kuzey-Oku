@extends(themeView('admin', 'layout.create'), ['tab' => true])
@section('form')
    {!! $errors->first('image', '<div class="alert alert-danger">:message</div>') !!}
    {{ Html::file('image')->class('dropify')->accept('.png, .jpg, .jpeg, .gif') }}
    @foreach (languageList() as $lang)
        <div id="{{ $lang->code }}" class="tab-pane @if ($loop->first) active show @endif">
            {{ Html::label(__("admin/{$folder}.form_title"))->id("title[$lang->code]") }}
            {{ Html::text("title[$lang->code]")->class('form-control')->placeholder(__("admin/{$folder}.form_title_placeholder")) }}
            {{ Html::label(__("admin/{$folder}.form_description")) }}
            {{ Html::textarea("description[$lang->code]")->class('editor') }}
            {{ Html::label(__("admin/{$folder}.form_tags")) }}
            {{ Html::text("tags[$lang->code]")->class('form-control')->placeholder(__("admin/{$folder}.form_tags_placeholder")) }}
        </div>
    @endforeach
    <div class="row">
        <div class="col-lg-4">
            {{ Html::label(__("admin/{$folder}.form_category")) }}
            {{ Html::select('category_id', $categories)->class('form-control') }}
        </div>
        <div class="col-lg-4">
            {{ Html::label(__('admin/general.order')) }} <span class="manitory">*</span>
            {{ Html::number('order', 0)->class('form-control') }}
        </div>
        <div class="col-lg-4">
            {{ Html::label(__('admin/general.status')) }} <span class="manitory">*</span>
            {{ Html::select('status', statusList(), 'default')->class('form-control') }}
        </div>
    </div>
@endsection
