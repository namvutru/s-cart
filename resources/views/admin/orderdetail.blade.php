<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    
                    <div class="row" id="order-body">
                        <div class="col-sm-6">
                            <table class="table table-hover box-body text-wrap table-bordered">
                                <tr>
                                    <td class="td-title">Tên:</td>
                                    <td><a href="#" class="updateInfoRequired" data-name="first_name"
                                            data-type="text" data-pk="{{ $order->id }}"
                                            data-url="{{ url('/updateOrderInfo') }}"
                                            data-title="Tên">{{ $order->first_name }}</a></td>
                                </tr>
                                <tr>
                                    <td class="td-title">Họ:</td>
                                    <td><a href="#" class="updateInfoRequired" data-name="last_name"
                                            data-type="text" data-pk="{{ $order->id }}"
                                            data-url="{{ url('/updateOrderInfo') }}"
                                            data-title="Họ">{{ $order->last_name }}</a></td>
                                </tr>
                                <tr>
                                    <td class="td-title">Điện thoại:</td>
                                    <td><a href="#" class="updateInfoRequired" data-name="phone_number" data-type="text"
                                            data-pk="{{ $order->id }}"
                                            data-url="{{ url('/updateOrderInfo') }}"
                                            data-title="Điện thoại">{{ $order->phone_number }}</a></td>
                                </tr>
                                <tr>
                                    <td class="td-title">Email:</td>
                                    <td>{{ $order->email }}</td>
                                </tr>
                                <tr>
                                    <td class="td-title">Địa chỉ:</td>
                                    <td><a href="#" class="updateInfoRequired" data-name="address"
                                            data-type="text" data-pk="{{ $order->id }}"
                                            data-url="{{ url('/updateOrderInfo') }}"
                                            data-title="Địa chỉ">{{ $order->address }}</a></td>
                                </tr>
                                
                            </table>
                        </div>
                        <div class="col-sm-6">
                            <table class="table table-bordered">
                                <tr>
                                    <td class="td-title">Trạng thái đơn hàng:</td>
                                    <td><a href="#" class="updateStatus" data-name="status" data-type="select"
                                            data-source="{&quot;1&quot;:&quot;New&quot;,&quot;2&quot;:&quot;Processing&quot;,&quot;3&quot;:&quot;Hold&quot;,&quot;4&quot;:&quot;Canceled&quot;,&quot;5&quot;:&quot;Done&quot;,&quot;6&quot;:&quot;Failed&quot;}"
                                            data-pk="{{ $order->id }}" data-value="{{ $order->status }}"
                                            data-url="{{ url('/updateOrderInfo') }}"
                                            data-title="Trạng thái đơn hàng">
                                            @if($order->status == 1) New
                                            @elseif($order->status == 2)  Processing 
                                            @elseif($order->status ==3) Hold
                                            @elseif($order->status == 4) Canceled
                                            @elseif($order->status == 5) Done
                                            @else Failed
                                            @endif
                                        </a></td>
                                </tr>
                               
                                
                                <tr>
                                    <td>Tên miền:</td>
                                    <td>https://namvutru.org</td>
                                </tr>
                                <tr>
                                    <td></i> Tạo lúc:</td>
                                    <td>{{ $order->created_at }}</td>
                                </tr>
                            </table>
                            {{-- <table class="table table-hover box-body text-wrap table-bordered">
                                <tr>
                                    <td class="td-title"><i class="far fa-money-bill-alt nav-icon"></i> Tiền tệ:</td>
                                    <td>USD</td>
                                </tr>
                                <tr>
                                    <td class="td-title"><i class="fas fa-chart-line"></i> Tỉ giá:</td>
                                    <td>1.00</td>
                                </tr>
                            </table> --}}
                        </div>
                    </div>
                    <form id="form-add-item" action method>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"> <input
                            type="hidden" name="order_id" value="{{ $order->id }}">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card collapsed-card">
                                    <div class="table-responsive">
                                        <table class="table table-hover box-body text-wrap table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Tên</th>
                                                    
                                                    <th class="product_price">Giá</th>
                                                    <th class="product_qty">Số lượng</th>
                                                    <th class="product_total">Tổng tiền</th>
                                                    
                                                    <th>Thao tác</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($listitems as $item)
                                                    <tr>
                                                        <td>{{ $item->name }}
                                                        </td>
                                                        
                                                        <td class="product_price"><a href="#"
                                                                class="edit-item-detail" 
                                                                data-value="{{ $item->price }}"
                                                                data-order="{{ $order->id }}"
                                                                data-name="price" data-type="text" min="0"
                                                                data-pk="{{ $item->id }}"
                                                                data-url="{{ url('/updateItem') }}"
                                                                data-title="Giá">{{ $item->price }}</a></td>
                                                        <td class="product_qty">x <a href="#"
                                                                class="edit-item-detail" 
                                                                data-value="{{ $item->qty }}" 
                                                                data-name="qty"
                                                                data-type="number" min="0"
                                                                data-pk="{{ $item->id }}"
                                                                data-order="{{ $order->id }}"
                                                                data-url="{{ url('/updateItem') }}"
                                                                data-title="Số lượng"> {{ $item->qty }}</a></td>
                                                        <td
                                                            class="product_total item_id_{{ $item->id }}">
                                                            {{ $item->price * $item->qty}}</td>
                                                        <td>
                                                            <span
                                                                onclick="deleteItem('{{ $item->id }}');"
                                                                class="btn btn-danger btn-xs" data-title="Delete"><i
                                                                    class="fa fa-trash" aria-hidden="true"></i></span>
                                                        </td>
                                                    </tr>

                                                @endforeach
                                                
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card collapsed-card">
                                <table class="table table-bordered">
                                    <tr style="font-weight:bold;" class="data-balance">
                                        <td class="td-title-normal">SubTotal:</td>
                                        <td style="text-align:right" class="data-subtotal">{{ $order->total }}</td>
                                    </tr>
                                   
                                    
                                    {{-- <tr>
                                        <td>Received(-):</td>
                                        <td style="text-align:right"><a href="#"
                                                class="updatePrice data-received" data-name="received"
                                                data-type="text" data-pk="9b177df7-a80d-4ed9-8b70-2e289808a0ec"
                                                data-url="https://demo.s-cart.org/sc_admin/order/update"
                                                data-title="Đã nhận">0.00</a></td>
                                    </tr>
                                    <tr style="font-weight:bold;" class="data-balance">
                                        <td>Còn lại:</td>
                                        <td style="text-align:right">{{ $order->total }}</td>
                                    </tr> --}}
                                </table>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <table class="table table-hover box-body text-wrap table-bordered">
                                    <tr>
                                        <td class="td-title">Ghi chú:</td>
                                        <td>
                                            <a href="#" class="updateInfo" data-name="comment"
                                                data-type="text" data-pk="{{ $order->id }}"
                                                data-url="{{ url('/updateOrderInfo') }}" data-title>
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="card collapsed-card">
                <div class="card-header border-transparent">
                    <h3 class="card-title">Lịch sử đơn hàng</h3>
                    <div class="order-info">
                        <span> {{$order->agent}}</span>
                    </div>
                    {{-- <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div> --}}
                </div>

                <div class="card-body p-0 out">
                    <div class="table-responsive">
                        <table class="table m-0" id="history">
                            <tr>
                                <th>Nhân viên</th>
                                <th>Nội dung</th>
                                <th>Thời gian</th>
                            </tr>
                            <tr>

                                
                                <td></td>
                                <td>
                                    <div class="history">New order</div>
                                </td>
                                <td>{{ $order->created_at }}</td>
                            </tr>

                            @foreach ($listchangestatus as $changestatus)
                            <tr>
                                <td>{{ $changestatus->user_name }} </td>
                                <td>
                                    <div class="history">{{ $changestatus->change }}</div>
                                </td>
                                <td>{{ $changestatus->created_at }}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>

                </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </section>

    </div>

   

    <aside class="control-sidebar control-sidebar-dark">

    </aside>

    
    </div>


    <script src="https://demo.s-cart.org/admin/LTE/plugins/jquery/jquery.min.js"></script>

    <script src="https://demo.s-cart.org/admin/LTE/plugins/jquery-ui/jquery-ui.min.js"></script>


    <script src="https://demo.s-cart.org/admin/LTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="https://demo.s-cart.org/admin/LTE/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="https://demo.s-cart.org/admin/LTE/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>



    <script src="https://demo.s-cart.org/admin/LTE/plugins/summernote/summernote-bs4.min.js"></script>

    <script src="https://demo.s-cart.org/admin/LTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

    <script src="https://demo.s-cart.org/admin/LTE/plugins/sparklines/sparkline.js"></script>

    <script src="https://demo.s-cart.org/admin/LTE/plugins/fastclick/fastclick.js"></script>

    <script src="https://demo.s-cart.org/admin/LTE/dist/js/adminlte.js"></script>
    <script src="https://demo.s-cart.org/admin/plugin/sweetalert2.all.min.js"></script>

    <script src="https://demo.s-cart.org/admin/LTE/plugins/select2/js/select2.full.min.js"></script>
    <script src="https://demo.s-cart.org/admin/plugin/bootstrap-switch.min.js"></script>
    <script src="https://demo.s-cart.org/admin/LTE/plugins/iCheck/icheck.min.js"></script>
    <script src="https://demo.s-cart.org/admin/LTE/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
    <script src="https://demo.s-cart.org/admin/plugin/jquery.pjax.js"></script>

    <script src="https://demo.s-cart.org/admin/plugin/bootstrap-editable.min.js"></script>
    <script type="text/javascript">
        // function update_total(e) {
        //     node = e.closest('tr');
        //     var qty = node.find('.add_qty').eq(0).val();
        //     var price = node.find('.add_price').eq(0).val();
        //     node.find('.add_total').eq(0).val(qty * price);
        // }


        // //Add item
        // function selectProduct(element) {
        //     node = element.closest('tr');
        //     var id = node.find('option:selected').eq(0).val();
        //     if (!id) {
        //         node.find('.add_sku').val('');
        //         node.find('.add_qty').eq(0).val('');
        //         node.find('.add_price').eq(0).val('');
        //         node.find('.add_attr').html('');
        //         node.find('.add_tax').html('');
        //     } else {
        //         $.ajax({
        //             url: 'https://demo.s-cart.org/sc_admin/order/product_info',
        //             type: "get",
        //             dateType: "application/json; charset=utf-8",
        //             data: {
        //                 id: id,
        //                 order_id: 'O-UE12L-Y78KK',
        //             },
        //             beforeSend: function() {
        //                 $('#loading').show();
        //             },
        //             success: function(returnedData) {
        //                 node.find('.add_sku').val(returnedData.sku);
        //                 node.find('.add_qty').eq(0).val(1);
        //                 node.find('.add_price').eq(0).val(returnedData.price_final * 1.00);
        //                 node.find('.add_total').eq(0).val(returnedData.price_final * 1.00);
        //                 node.find('.add_attr').eq(0).html(returnedData.renderAttDetails);
        //                 node.find('.add_tax').eq(0).html(returnedData.tax);
        //                 $('#loading').hide();
        //             }
        //         });
        //     }

        // }
        // $('#add-item-button').click(function() {
        //     var html =
        //         '<tr>              <td>                <select onChange="selectProduct($(this));"  class="add_id form-control select2" name="add_id[]" style="width:100% !important;">                <option value="0">Chọn sản phẩm</option><option  value="980b670b-3317-494b-a794-12c5516650d2" >Cu Do Ha Tinh(CU-DO-HA-TINH)</option><option  value="980b670b-3321-46da-924e-9a3f7b33006b" >Man Hau Lang Son(MAN-HAU-LANG-SON)</option><option  value="980b670b-3328-4352-95dd-b68d9aff6465" >Banh Gai Tu Tru(BANH-GAI-TU-TRU)</option><option  value="980b670b-3333-4b2f-93d8-c9e195fb203a" >Banh Trang Tron(BANH-TRANG-TRON)</option><option  value="980b670b-3338-4a44-84aa-9198682e7782" >Muoi Tay Ninh(MUOI-TAY-NINH)</option><option  value="980b670b-333e-4227-b34c-d74de0d6c9d2" >Keo Doi Lac(KEO-DOI-LAC)</option><option  value="980b670b-3343-4d83-9af6-34b66d1f9aa7" >Sau Rieng Dak Lak(SAU-RIENG-DAK-LAK)</option><option  value="980b670b-3348-4ca5-95f7-a9d48d2c80e8" >Don Quang Ngai(DON-QUANG-NGAI)</option><option  value="980b670b-334e-48b4-98fd-1affef5a9cb2" >Banh Khot Vung Tau(BANH-KHOT-VUNG-TAU)</option><option  value="980b670b-3353-434a-b567-1df3497e2999" >Chao Luon Xu Nghe(CHAO-LUON-XU-NGHE)</option><option  value="980b670b-3358-4b76-b761-0ddd2d85bbc0" >Banh Dau Xanh Hung Yen(BANH-DAU-XANH-HUNG-YEN)</option><option  value="980b670b-335e-495f-86ca-5525352871d5" >Hu Tieu Nam Vang(HU-TIEU-NAM-VANG)</option><option  value="980b670b-3368-46ae-ba7d-f634bd0cf9df" >Chom Chom Nhan(CHOM-CHOM-NHAN)</option><option  value="980b670b-336d-43ae-8d6e-a98721cf4027" >Cam Vinh Loai I(CAM-VINH-LOAI-I)</option><option  value="980b670b-3372-4335-ac8c-b4291e99e0f3" >Mi Quang(MI-QUANG)</option><option  value="980b670b-3379-4c7e-8c66-9be9b13a4821" >Chao Long Tiet Canh(CHAO-LONG-TIET-CANH)</option><option  value="980b670b-3384-49e4-a259-aff3a2c6f319" >Xoai Cat Hoa Loc(XOAI-CAT-HOA-LOC)</option><option  value="980b670b-3389-44f8-9fe0-ed2d9a9b6cc2" >Com Niu Sai Gon(COM-NIU-SAI-GON)</option><option  value="980b670b-338e-4462-af3d-c510208676ac" >Com Tam An Giang(COM-TAM-AN-GIANG)</option><option  value="980b670b-3393-41e6-b5bd-25e58fb150e0" >Vai Thieu Luc Ngan(VAI-THIEU-LUC-NGAN)</option><option  value="980b670b-3398-4514-8007-8032611b6bc2" >Nem Chua Thanh Hoa(NEM-CHUA-THANH-HOA)</option><option  value="980b670b-339d-4b02-8b1e-e0aacc09e346" >Cha Ca Nha Trang(CHA-CA-NHA-TRANG)</option><option  value="980b670b-33a3-4fd9-a380-1da5df7cdf8a" >Ho Tieu(HO-TIEU)</option><option  value="980b670b-33a8-4cbb-96d2-5a56c0c3ec8c" >Nhan Long Hung Yen(NHAN-LONG-HUNG-YEN)</option><option  value="980b670b-33ad-4768-b908-74b5f12140da" >Ca Phe Buon Me(CA-PHE-BUON-ME)</option><option  value="980b670b-33b2-48eb-bdfd-a0d357b7bd80" >Keo Dua Ben Tre(KEO-DUA-BEN-TRE)</option><option  value="980b670b-33b8-4a98-bb98-b53ba8cc8cbf" >Mang Cut(MANG-CUT)</option><option  value="980b670b-33bd-4189-bd23-c92ce55d7e95" >Non La Vietnam(NON-LA-VIETNAM)</option><option  value="980b670b-33c2-4171-9bca-81f1b633fc9a" >Thit Trau Gac Bep(THIT-TRAU-GAC-BEP)</option><option  value="980b670b-33c7-458b-8c52-8bf209d5c727" >Pho Ha Noi(PHO-HA-NOI)</option><option  value="980b670b-33d2-46f6-b60f-22a5423abbba" >Ao Dai Vietnam(AO-DAI-VIETNAM)</option><option  value="980b670b-33d7-4924-8821-08137e74840a" >Thanh Long Ruot Do(THANH-LONG-RUOT-DO)</option>              </select>              <span class="add_attr"></span>            </td>              <td><input type="text" disabled class="add_sku form-control"  value=""></td>              <td><input onChange="update_total($(this));" type="number" step="0.01" min="0" class="add_price form-control" name="add_price[]" value="0"></td>              <td><input onChange="update_total($(this));" type="number" min="0" class="add_qty form-control" name="add_qty[]" value="0"></td>              <td><input type="number" disabled class="add_total form-control" value="0"></td>              <td><input  type="number" step="0.01" min="0" class="add_tax form-control" name="add_tax[]" value="0"></td>              <td><button onClick="$(this).parent().parent().remove();" class="btn btn-danger btn-md btn-flat" data-title="Delete"><i class="fa fa-times" aria-hidden="true"></i></button></td>            </tr>          <tr>          </tr>';
        //     $('#add-item').before(html);
        //     $('.select2').select2();
        //     $('#add-item-button-save').show();
        // });

        // $('#add-item-button-save').click(function(event) {
        //     $('#add-item-button').prop('disabled', true);
        //     $('#add-item-button-save').button('loading');
        //     $.ajax({
        //         url: 'https://demo.s-cart.org/sc_admin/order/add_item',
        //         type: 'post',
        //         dataType: 'json',
        //         data: $('form#form-add-item').serialize(),
        //         beforeSend: function() {
        //             $('#loading').show();
        //         },
        //         success: function(result) {
        //             $('#loading').hide();
        //             if (parseInt(result.error) == 0) {
        //                 location.reload();
        //             } else {
        //                 alertJs('error', result.msg);
        //             }
        //         }
        //     });
        // });

        //End add item
        //

        $(document).ready(function() {
            all_editable();
        });

        function all_editable() {
           
            $.fn.editable.defaults.params = function(params) {
                params._token = "{{ csrf_token() }}";
                return params;
            };

            $('.updateInfo').editable({
                success: function(response) {
                    if (response.error == 0) {
                        alertJs('success', response.msg);
                    } else {
                        alertJs('error', response.msg);
                    }
                }
            });

            // $(".updatePrice").on("shown", function(e, editable) {
            //     var value = $(this).text().replace(/,/g, "");
            //     editable.input.$input.val(parseInt(value));
            // });

            $('.updateStatus').editable({
                validate: function(value) {
                    if (value == '') {
                        return 'Không được rỗng';
                    }
                },
                success: function(response) {
                    if (response.error == 0) {
                        alertJs('success', response.msg);
                    } else {
                        alertJs('error', response.msg);
                    }
                }
            });

            $('.updateInfoRequired').editable({
                validate: function(value) {
                    if (value == '') {
                        return 'Không được rỗng';
                    }
                },
                success: function(response, newValue) {
                    console.log(response.data);
                    console.log(response.msg);
                    if (response.error == 0) {
                        alertJs('success', response.msg);
                    } else {
                        alertJs('error', response.msg);
                    }
                }
            });


            $('.edit-item-detail').editable({
                ajaxOptions: {
                    type: 'post',
                    dataType: 'json'
                },
                validate: function(value) {
                    if (value == '') {
                        return 'Không được rỗng';
                    }
                    if (!$.isNumeric(value)) {
                        return 'Chỉ dùng số';
                    }
                },
                success: function(response, newValue) {
                    console.log(response.data);
                    if (response.error == 0) {
                        // $('.data-shipping').html(response.detail.shipping);
                        // $('.data-received').html(response.detail.received);
                        $('.data-subtotal').html(response.subtotal);
                        // $('.data-tax').html(response.detail.tax);
                        // $('.data-total').html(response.detail.total);
                        // $('.data-shipping').html(response.detail.shipping);
                        // $('.data-discount').html(response.detail.discount);
                        $('.item_id_' + response.id).html(response.total);
                        // var objblance = $('.data-balance').eq(0);
                        // objblance.before(response.detail.balance);
                        // objblance.remove();
                        alertJs('success', response.msg);
                    } else {
                        alertJs('error', response.msg);
                    }
                }

            });

            // $('.updatePrice').editable({
            //     ajaxOptions: {
            //         type: 'post',
            //         dataType: 'json'
            //     },
            //     validate: function(value) {
            //         if (value == '') {
            //             return 'Không được rỗng';
            //         }
            //         if (!$.isNumeric(value)) {
            //             return 'Chỉ dùng số';
            //         }
            //     },

            //     success: function(response, newValue) {
            //         if (response.error == 0) {
            //             $('.data-shipping').html(response.detail.shipping);
            //             $('.data-received').html(response.detail.received);
            //             $('.data-subtotal').html(response.detail.subtotal);
            //             $('.data-tax').html(response.detail.tax);
            //             $('.data-total').html(response.detail.total);
            //             $('.data-shipping').html(response.detail.shipping);
            //             $('.data-discount').html(response.detail.discount);
            //             var objblance = $('.data-balance').eq(0);
            //             objblance.before(response.detail.balance);
            //             objblance.remove();
            //             alertJs('success', response.msg);
            //         } else {
            //             alertJs('error', response.msg);
            //         }
            //     }
            // });
        }



        function deleteItem(id) {
            
            $.ajax({
                method: 'POST',
                url: '{{ url('/deleteItem') }}',
                data: {
                    'id': id,
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {
                    if (response.error == 0) {
                        location.reload();
                        alertJs('success', response.msg);
                    } else {
                        alertJs('error', response.msg);
                    }

                }
            });
                    
        }



        // $(document).ready(function() {
        //     // does current browser support PJAX
        //     if ($.support.pjax) {
        //         $.pjax.defaults.timeout = 2000; // time in milliseconds
        //     }

        // });

       
    </script>
    {{-- <script type="text/javascript">
        $(function() {
            $('input.checkbox').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
            });
        });

        $(document).on('ready pjax:end', function(event) {
            $('input.checkbox').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
            });
        })
    </script>
    <script>
        $(function() {
            $(".date_time").datepicker({
                dateFormat: "yy-mm-dd"
            });
        });
    </script> --}}
    {{-- <script type="text/javascript">
        (function($) {

            $.fn.filemanager = function(type, options) {
                type = type || 'other';

                this.on('click', function(e) {
                    type = $(this).data('type') || type; //sc
                    var route_prefix = (options && options.prefix) ? options.prefix :
                        'https://demo.s-cart.org/sc_admin/uploads';
                    var target_input = $('#' + $(this).data('input'));
                    var target_preview = $('#' + $(this).data('preview'));
                    window.open(route_prefix + '?type=' + type, 'Quản lý file', 'width=900,height=600');
                    window.SetUrl = function(items) {
                        var file_path = items.map(function(item) {
                            return item.url;
                        }).join(',');

                        // set the value of the desired input to image url
                        target_input.val('').val(file_path).trigger('change');

                        // clear previous preview
                        target_preview.html('');

                        // set or change the preview image src
                        items.forEach(function(item) {
                            target_preview.append(
                                $('<img>').attr('src', item.thumb_url)
                            );
                        });

                        // trigger change event
                        target_preview.trigger('change');
                    };
                    return false;
                });
            }

        })(jQuery);

        $('.lfm').filemanager();
    </script> --}}
    {{-- <script type="text/javascript">
        // Select row
        $(function() {
            //Enable check and uncheck all functionality
            $(".grid-select-all").click(function() {
                var clicks = $(this).data('clicks');
                if (clicks) {
                    //Uncheck all checkboxes
                    $(".box-body input[type='checkbox']").iCheck("uncheck");
                    $(".far", this).removeClass("fa-check-square").addClass('fa-square');
                } else {
                    //Check all checkboxes
                    $(".box-body input[type='checkbox']").iCheck("check");
                    $(".far", this).removeClass("fa-square").addClass('fa-check-square');
                }
                $(this).data("clicks", !clicks);
            });

        }); --}}
        {{-- // == end select row

        function format_number(n) {
            return n.toFixed(0).replace(/./g, function(c, i, a) {
                return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
            });
        }

        // active tree menu
        $('.nav-treeview > li.active').parents('.has-treeview').addClass('active menu-open');
        // ==end active tree menu
    </script> --}}
    <script>
      

        function alertJs(type = 'error', msg = '') {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            Toast.fire({
                type: type,
                title: msg
            })
        }

        function alertMsg(type = 'error', msg = '', note = '') {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: true,
            });
            swalWithBootstrapButtons.fire(
                msg,
                note,
                type
            )
        }

        function alertConfirm(type = 'warning', msg = '') {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            Toast.fire({
                type: type,
                title: msg
            })
        }
        $('[data-toggle="tooltip"]').tooltip();
        $('.select2').select2();
    </script>
