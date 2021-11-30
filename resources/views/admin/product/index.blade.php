@extends('admin.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        {{-- @include('admin.partial.content-header' , ['title' => 'Advanced Form Elements', 'preview'=>'Preview']) --}}

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                       <div class="box-header">
                            <h3 class="box-title">{{ __($langFile.'Products') }}</h3>
                            <a href="{{ route('products.create') }}" class="btn btn-primary @if(app()->getLocale() == 'en') pull-right @else pull-left @endif">
                                {{ __($langFile.'Create') }}
                            </a>
                       </div>
                       <!-- /.box-header -->
                        <div class="box-body">
                          <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped text-center">
                               <thead>
                                  <tr>
                                    <th>{{ __($langFile.'Photo') }}</th>
                                    <th>{{ __($langFile.'Title') }}</th>
                                    <th>{{ __($langFile.'Department') }}</th>
                                    <th>{{ __($langFile.'Category') }}</th>
                                    <th>{{ __($langFile.'Karat') }}</th>
                                    <th>{{ __($langFile.'Weightt') }}</th>
                                    <th>{{ __($langFile.'Effort Price') }}</th>
                                    <th>{{ __($langFile.'Stone Price') }}</th>
                                    <th>{{ __($langFile.'Stone Weight') }}</th>
                                    <th>{{ __($langFile.'Edit') }}</th>
                                    <th>{{ __($langFile.'Delete') }}</th>
                                  </tr>
                               </thead>
                               <tbody>
                                  @foreach($products as $product)
                                      <tr>
                                        <td class="image-resposive"><img style="width: 20rem;" src="{{ $product->image_url }}" alt=""></td>
                                        @if(app()->getLocale() == 'en')
                                            <td>{{$product->title_en}}</td>
                                        @else
                                            <td>{{$product->title_ar}}</td>
                                        @endif
                                        <td>{{$product->department->title}}</td>
                                        <td>{{$product->category->title}}</td>
                                        <td>{{$product->karat->title}}</td>
                                        <td>{{$product->weight}}</td>
                                        <td>{{$product->effort_price}}</td>
                                        <td>{{$product->stone_price}}</td>
                                        <td>{{$product->stone_weight}}</td>
                                        <td>
                                             <a href="{{ route('products.edit', $product->id) }}">
                                                  <i class="fa fa-edit"></i> <span>{{ __($langFile.'Edit') }}</span>
                                              </a>
                                         </td>
                                         <td>
                                              <a
                                                  href="{{ route('products.destroy', $product->id) }}"
                                                  onclick="event.preventDefault(); document.getElementById('delete-form-{{$product->id}}').submit();"
                                                  class="btn btn-danger">
                                                  {{ __($langFile.'Delete') }}
                                              </a>
                                              <form id="delete-form-{{$product->id}}" action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: none;">
                                                  @csrf
                                                  <input type="hidden" name="_method" value="delete" />
                                              </form>
                                         </td>
                                      </tr>
                                  @endforeach
                               </tbody>
                               <tfoot>
                                  <tr>
                                     <th>{{ __($langFile.'Photo') }}</th>
                                     <th>{{ __($langFile.'Department') }}</th>
                                     <th>{{ __($langFile.'Category') }}</th>
                                     <th>{{ __($langFile.'Karat') }}</th>
                                     <th>{{ __($langFile.'Weight') }}</th>
                                     <th>{{ __($langFile.'Effort Price') }}</th>
                                     <th>{{ __($langFile.'Stone Price') }}</th>
                                     <th>{{ __($langFile.'Stone Weight') }}</th>
                                     <th>{{ __($langFile.'Edit') }}</th>
                                     <th>{{ __($langFile.'Delete') }}</th>
                                  </tr>
                               </tfoot>
                            </table>
                          </div>
                        </div>
                       <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

@stop

@push('styles')
  <style type="text/css">
    /*table tr td img
    {
      display: block;
      max-width: 100%;
      height: auto;
    }*/
  </style>
@endpush
