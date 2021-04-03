@extends('giaodien.master')
@section('title','Tin Tức')
@section('content')

<br><br>
<div style="width: 100%; height: 65px; background-color: #ECE7E7">
	<p style="font-size: 28px;text-align: center;padding-top: 10px"> BLOG</p>
</div>
<br>
<br>
<div class="container" style="font-size: 14px">
	<h2>{{$tintuc->ten_tin}}</h2>
	<br>
	<?php echo $tintuc->noi_dung ?>
	<br>
	<span style="color: red">Posted by {{$tintuc->nguoi_dang}} / {{$tintuc->created_at}}</span>
	
</div>
<br>
@endsection