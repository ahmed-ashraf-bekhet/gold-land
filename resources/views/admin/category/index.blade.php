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
                            <h3 class="box-title">{{ __($langFile.'Categories') }}</h3>
                            <a href="{{ route('categories.create') }}" class="btn btn-primary @if(app()->getLocale() == 'en') pull-right @else pull-left @endif">
                                {{ __($langFile.'Create') }}
                            </a>
                       </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                          <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                               <thead>
                                  <tr>
                                     <th>{{ __($langFile.'Title En') }}</th>
                                     <th>{{ __($langFile.'Title Ar') }}</th>
                                     <th>{{ __($langFile.'Edit') }}</th>
                                     <th>{{ __($langFile.'Delete') }}</th>
                                  </tr>
                               </thead>
                               <tbody>
                                  @foreach($categories as $category)
                                      <tr>
                                         <td>{{$category->title_en}}</td>
                                         <td>{{$category->title_ar}}</td>
                                         <td>
                                             <a href="{{ route('categories.edit', $category->id) }}">
                                                  <i class="fa fa-edit"></i> <span>{{ __($langFile.'Edit') }}</span>
                                              </a>
                                         </td>
                                         <td>
                                              <a 
                                                  href="{{ route('categories.destroy', $category->id) }}"
                                                  onclick="event.preventDefault(); document.getElementById('delete-form-{{$category->id}}').submit();" 
                                                  class="btn btn-danger">
                                                  {{ __($langFile.'Delete') }}
                                              </a>
                                              <form id="delete-form-{{$category->id}}" action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: none;">
                                                  @csrf
                                                  <input type="hidden" name="_method" value="delete" />
                                              </form>
                                         </td>
                                      </tr>
                                  @endforeach
                               </tbody>
                               <tfoot>
                                  <tr>
                                     <th>{{ __($langFile.'Title En') }}</th>
                                     <th>{{ __($langFile.'Title Ar') }}</th>
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