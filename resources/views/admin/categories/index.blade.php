@extends('admin.layouts.app_admin')

@section('content')

<div class="container">

	@component('admin.components.breadcrumb')
	  @slot('title') Список категорий @endslot
	  @slot('parent') Главная @endslot
	  @slot('active') Категории @endslot
	@endcomponent
	
	<hr />
	{{-- {{dump($categories)}} --}}
	<a href="{{route('admin.category.create')}}" class="btn btn-primary pull-right"><i class="fafa-plus-square-o"></i>Создать категорию</a>
	<table class="table table-striped">
		<thead>
			<th>Наименование</th>
			<th>Публикация</th>
			<th class="text-right">Действие</th>
		</thead>
		<tbody>
			@forelse ($categories as $category)
			  <tr>
			  	<td>{{$category->title}}</td>
			  	<td>{{$category->published}}</td>
			  	<td>
			  		<a href="{{route('admin.category.edit',$category)}}"><i class="fafa-edit"></i></a>
			  	</td>
			  </tr>
			  @empty
			  <tr>
			  	<td colspan="3" class="text-container"><h2>Данные не существуют</h2></td>
			  </tr>
			  @endforelse
		</tbody>
		<tfoot>
			<tr>
				<td colspan="3">
					<ul class="pagination pull-right">
						{{$categories -> links()}}
					</ul>
				</td>
			</tr>
		</tfoot>
	</table>


</div>

@endsection