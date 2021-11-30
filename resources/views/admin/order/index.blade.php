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
                            <h3 class="box-title">{{ __($langFile.'Orders') }}</h3>
                       </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                          <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                               <thead>
                                  <tr>
                                     <th>{{ __($langFile.'User') }}</th>
                                     <th>{{ __($langFile.'Phone')}}</th>
                                     <th>{{ __($langFile.'CivilID')}}</th>
                                     <th>{{ __($langFile.'Floor')}}</th>
                                     <th>{{ __($langFile.'Building')}}</th>
                                     <th>{{ __($langFile.'Street')}}</th>
                                     <th>{{ __($langFile.'Area')}}</th>
                                     <th>{{ __($langFile.'City')}}</th>
                                     <th>{{ __($langFile.'Total') }}</th>
                                     <th>{{ __($langFile.'status') }}</th>
                                     <th>{{ __($langFile.'Products') }}</th>
                                     <th>{{ __($langFile.'orderStatus') }}</th>
                                     <th></th>
                                     <th></th>
                                  </tr>
                               </thead>
                               <tbody>
                                  @foreach($orders as $order)
                                      <tr>
                                         <td>{{$order->user->name}}</td>
                                         <td>{{$order->user->phone}}</td>
                                         <td>{{$order->user->national_id}}</td>
                                         <td>{{$order->user->floor}}</td>
                                         <td>{{$order->user->building}}</td>
                                         <td>{{$order->user->street}}</td>
                                         <td>{{$order->user->area}}</td>
                                         <td>{{$order->user->city}}</td>
                                         <td>{{$order->total}}</td>
                                         <td>
                                            <select class="form-control selected2 statusMenu" data-order_id="{{ $order->id }}" style="width: 100%;" required>
										            <option value="Finished"
										            @if($order->status=='Finished')
										            selected
										            @endif
										            >
										                @if(app()->getLocale()== 'en')
										                    Finished
                                                        @else
                                                            منتهى
                                                        @endif
										            </option>
										            <option value="Pending"
										            @if($order->status=='Pending')
										            selected
										            @endif
										            >
										                @if(app()->getLocale()== 'en')
										                    Pending
                                                        @else
                                                            معلق
                                                        @endif
										            </option>

			                                </select>
                                         </td>
                                         <td>
                                             <a href="#" data-toggle="modal" data-target="#exampleModalCenter{{$order->id}}">
                                                  <i class="fa fa-eye"></i> <span>{{ __($langFile.'Products') }}</span>
                                              </a>
                                              <!-- Modal -->
                                              <div class="modal fade" id="exampleModalCenter{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLongTitle">{{ __($langFile.'Products') }}</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    </div>
                                                    <div class="modal-body">
                                                      <div class="table-responsive">
                                                        <table class="table table-bordered table-hover">
                                                          <thead >
                                                            <tr>
                                                              <th scope="col">{{ __($langFile.'Image') }}</th>
                                                              <th scope="col">{{ __($langFile.'Department') }}</th>
                                                              <th scope="col">{{ __($langFile.'Category') }}</th>
                                                              <th scope="col">{{ __($langFile.'Karat') }}</th>
                                                              <th scope="col">{{ __($langFile.'Weight') }}</th>
                                                              <th scope="col">{{ __($langFile.'Number') }}</th>
                                                              <th scope="col">{{ __($langFile.'TotalPrice') }}</th>
                                                            </tr>
                                                          </thead>
                                                          <tbody>
                                                            @foreach($order->products as $product)
                                                            <tr>
                                                                {{-- <th scope="row">1</th> --}}
                                                                <td><img style="width: 5rem;" src="{{$product->image_url}}" alt=""></td>
                                                                <td>{{$product->department->title}}</td>
                                                                <td>{{$product->category->title}}</td>
                                                                <td>{{$product->karat->title}}</td>
                                                                <td>{{$product->weight}}</td>
                                                                <td>{{DB::table('product_orders')->select('quantity')->where('order_id', '=', $order->id)->where('product_id', '=', $product->id)->get()[0]->quantity}}</td>
                                                                <td>{{DB::table('product_orders')->select('total_price')->where('order_id', '=', $order->id)->where('product_id', '=', $product->id)->get()[0]->total_price}}</td>

                                                            </tr>
                                                            @endforeach
                                                          </tbody>
                                                        </table>
                                                      </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __($langFile.'Close') }}</button>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </td>
                                            <td>{{$order->payment}}</td>
                                            <td>{{ Carbon\Carbon::parse( $order->created_at )->addHours(3)->format('Y-m-d g:i A') }}</td>
                                            <td>
                                                <a
                                                    href="{{ route('orders.destroy', $order->id) }}"
                                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{$order->id}}').submit();"
                                                    class="btn btn-danger">
                                                    {{ __($langFile.'Delete') }}
                                                </a>
                                                <form id="delete-form-{{$order->id}}" action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="delete" />
                                                </form>
                                           </td>
                                    </tr>
                                  @endforeach
                               </tbody>
                               <tfoot>
                                  <tr>
                                    <th>{{ __($langFile.'User') }}</th>
                                    <th>{{ __($langFile.'Phone')}}</th>
                                    <th>{{ __($langFile.'CivilID')}}</th>
                                    <th>{{ __($langFile.'Floor')}}</th>
                                    <th>{{ __($langFile.'Building')}}</th>
                                    <th>{{ __($langFile.'Street')}}</th>
                                    <th>{{ __($langFile.'Area')}}</th>
                                    <th>{{ __($langFile.'City')}}</th>
                                    <th>{{ __($langFile.'Total') }}</th>
                                    <th>{{ __($langFile.'status') }}</th>
                                    <th>{{ __($langFile.'Products') }}</th>
                                    <th>{{ __($langFile.'orderStatus') }}</th>
                                    <th></th>
                                    <th></th>
                                  </tr>
                               </tfoot>
                            </table>
                            <select id="filterStatus" class="form-control selected2" style="width: 40%;" style="width: 100%;" required>
                                <option value="All">
                                    @if(app()->getLocale()== 'en')
									    All Orders
                                    @else
                                        جميع الطلبات
                                    @endif
                                </option>
                                <option value="Finished">
                                    @if(app()->getLocale()== 'en')
									    Finished
                                    @else
                                        منتهى
                                    @endif
                                </option>
                                <option value="Pending">
                                    @if(app()->getLocale()== 'en')
									    Pending
                                    @else
                                        معلق
                                    @endif
                                </option>
                            </select><br>
                            <form action="/filterDate" method="post">
                                @csrf
    	                        <div class="form-group">
    	                            <label for="category-id">Start</label>
                                    <input type="date" class="form-control" name="startDate"><br>
                                </div>
    	                        <div class="form-group">
                                    <label for="category-id">End</label>
                                    <input type="date" class="form-control" name="endDate"><br>
                                </div>
    	                        <div class="form-group">
                                    <input type="submit" value="Submit">
                                </div>
                            </form>
                        </div>
                        </div>
                       <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <script>
        console.log($('.statusMenu')[0])
        $('.statusMenu').change(function(){
        $.ajax({
        url:'/api/changeStatus/'+$(this).data('order_id')+'/'+$(this).val(),
        type:'GET',
        success: function(data){
            console.log(data)
            return
        },
        error:function(x,y,z){
            console.log(x+y+z)
        }
        })
        })
        $('#filterStatus').change(function(){
            if($(this).val()=="All"){
                window.location.href="/orders"
            }else{
                if($(this).val()=="Pending"){
                    window.location.href="/filtered_orders/Pending"
                }else{
                    window.location.href="/filtered_orders/Finished"
                }
            }
        })

    </script>
@stop
