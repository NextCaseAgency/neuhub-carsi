@section('description', trans('page.meta_clarification_title'))

@section('keywords', trans('page.meta_clarification_description'))

{!! $data->blocks[0]['data']['content'] !!}
