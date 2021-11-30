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
                            <h3 class="box-title">{{ __($langFile.'Karats') }}</h3>
                            <a href="{{ route('karats.create') }}" class="btn btn-primary @if(app()->getLocale() == 'en') pull-right @else pull-left @endif">
                                {{ __($langFile.'Create') }}
                            </a>
                       </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                          <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                               <thead>
                                  <tr>
                                     <th>{{ __($langFile.'Key') }}</th>
                                     <th>{{ __($langFile.'Title En') }}</th>
                                     <th>{{ __($langFile.'Title Ar') }}</th>
                                     <th>{{ __($langFile.'Edit') }}</th>
                                     <th>{{ __($langFile.'Delete') }}</th>
                                  </tr>
                               </thead>
                               <tbody>
                                  @foreach($karats as $karat)
                                      <tr>
                                         <td>{{$karat->key}}</td>
                                         <td>{{$karat->title_en}}</td>
                                         <td>{{$karat->title_ar}}</td>
                                         <td>
                                             <a href="{{ route('karats.edit', $karat->id) }}">
                                                  <i class="fa fa-edit"></i> <span>{{ __($langFile.'Edit') }}</span>
                                              </a>
                                         </td>
                                         <td>
                                              <a 
                                                  href="{{ route('karats.destroy', $karat->id) }}"
                                                  onclick="event.preventDefault(); document.getElementById('delete-form-{{$karat->id}}').submit();" 
                                                  class="btn btn-danger">
                                                  {{ __($langFile.'Delete') }}
                                              </a>
                                              <form id="delete-form-{{$karat->id}}" action="{{ route('karats.destroy', $karat->id) }}" method="POST" style="display: none;">
                                                  @csrf
                                                  <input type="hidden" name="_method" value="delete" />
                                              </form>
                                         </td>
                                      </tr>
                                  @endforeach
                               </tbody>
                               <tfoot>
                                  <tr>
                                     <th>{{ __($langFile.'Key') }}</th>
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