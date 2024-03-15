@extends(themeView('admin', 'layout.image'), ['item' => $project])
@section('form')
    {!! Form::hidden('project_id', $project->id) !!}
@endsection
