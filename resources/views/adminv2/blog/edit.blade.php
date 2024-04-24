@extends(themeView('admin', 'layout.edit'), ['tab' => true, 'item' => $blog])
@section('form')
    {{ Html::file('image')->class('dropify')->attribute('data-default-file', $blog->image_url)->accept('.png, .jpg, .jpeg, .gif') }}
    @foreach (languageList() as $lang)
        <div id="{{ $lang->code }}" class="tab-pane @if ($loop->first) active show @endif">
            {{ Html::label(__("admin/{$folder}.form_title")) }}
            {{ Html::text("title[$lang->code]")->value($blog->titles[$lang->code])->class('form-control')->placeholder(__("admin/{$folder}.form_title_placeholder")) }}
            {{ Html::label(__("admin/{$folder}.form_description")) }}
            {{ Html::textarea("description[$lang->code]", $blog->descriptions[$lang->code])->class('editor') }}
            {{ Html::label(__("admin/{$folder}.form_tags")) }}
            {{ Html::text("tags[$lang->code]", $blog->tags[$lang->code] ?? null, [
                'class' => 'form-control',
                'placeholder' => __("admin/{$folder}.form_tags_placeholder"),
            ]) }}
        </div>
    @endforeach
    <div class="row">
        <div class="col-lg-4">
            {{ Html::label(__("admin/{$folder}.form_category")) }}
            {{ Html::select('category_id', $categories, $blog->category_id, ['class' => 'form-control']) }}
        </div>
        <div class="col-lg-4">
            {{ Html::label(__('admin/general.order')) }} <span class="manitory">*</span>
            {{ Html::number('order', $blog->order, [
                'class' => 'form-control',
                'placeholder' => __('admin/general.order_placeholder'),
            ]) }}
        </div>
        <div class="col-lg-4">
            {{ Html::label(__('admin/general.status')) }} <span class="manitory">*</span>
            {{ Html::select('status', statusList(), $blog->status, ['class' => 'form-control']) }}

        </div>
    </div>
@endsection
