@extends('layouts.app')

@section('content')

<div class="container">
  <div id="ourPartners">
    <h1>Our partners on the map</h1>
    <div id="mapPartners" style="height:400px; width:100%;"></div>
  </div>
</div>
<script type="text/javascript">
    var langs = {{ json_decode($companies->toArray())}}
    console.log(langs);
</script>
@endsection
