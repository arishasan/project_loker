<script>
	$(function(){
		// SELLER JQUERY
		$('#data_table_holder').DataTable();
		$('#add_holder').hide();
		$('#edit_holder').hide();
		
		$('#add_data_seller').click(function(){
			$('#add_holder').fadeIn();
			$('#data_holder').fadeOut();
			$('#edit_holder').fadeOut();
		});

		$('#show_data_seller').click(function(){
			$('#add_holder').fadeOut();
			$('#data_holder').fadeIn();
			$('#edit_holder').fadeOut();
		});

		$('#cancel_submit').click(function(){
			$('#add_holder').fadeOut();
			$('#data_holder').fadeIn();
			$('input[class=form-control]').val('');
		});

		$('#cancel_submit_edit').click(function(){
			$('#add_holder').fadeOut();
			$('#edit_holder').fadeOut();
			$('#data_holder').fadeIn();
			$('input[class=form-control]').val('');
		});

		$('#seller_all_rec').on('click','.edit_rec',function(){
			var id = $(this).closest('tr').find('td:eq(0)').find('input[type=hidden]').val();
			var nama = $(this).closest('tr').find('td:eq(2)').find('input[type=hidden]').val();
			var category = $(this).closest('tr').find('td:eq(3)').find('input[type=hidden]').val();
			var email = $(this).closest('tr').find('td:eq(4)').find('input[type=hidden]').val();
			var telpon = $(this).closest('tr').find('td:eq(5)').find('input[type=hidden]').val();
			var alamat = $(this).closest('tr').find('td:eq(6)').find('input[type=hidden]').val();
			var status = $(this).closest('tr').find('td:eq(7)').find('input[type=hidden]').val();
			var level = $(this).closest('tr').find('td:eq(8)').find('input[type=hidden]').val();

			$('#seller_id').val(id);
			$('#nama').val(nama);
			$('#category').val(category);
			$('#email').val(email);
			$('#telpon').val(telpon);
			$('#alamat').val(alamat);
			$('#status_aktif').val(status);
			$('#level').val(level);

			$('#add_holder').fadeOut();
			$('#edit_holder').fadeIn();
			$('#data_holder').fadeOut();

			$('#showPromptDelete').html('');
		});

		$('#seller_all_rec').on('click','.delete_rec',function(){
			var id = $(this).closest('tr').find('td:eq(0)').find('input[type=hidden]').val();
			var nama = $(this).closest('tr').find('td:eq(2)').find('input[type=hidden]').val();
			var prompt = '<div class="alert alert-icon alert-danger" role="alert">'+
						 '<i class="fe fe-alert-triangle mr-2" aria-hidden="true"></i> Are you sure about to delete, <b>'+ nama + '</b> ? <br/>'+
						 '<form method="POST" action="{{ url("Seller/destroy") }}">'+
						 '{{ csrf_field() }} <input type="hidden" name="seller_id" value="'+id+'">'+
						 '<button type="submit" class="btn btn-danger">Yes</button> '+
						 '<button type="button" class="btn btn-success gagal_delete">No</button>'+
						 '</form>'+
						 '</div>';

			$('#showPromptDelete').html(prompt);
		});

		$('#showPromptDelete').on('click','.gagal_delete',function(){
			$('#showPromptDelete').html('');
		});
		// END OF SELLER JQUERY

		// PRICE JQUERY
		$('#add_data_price').click(function(){
			$('#add_holder').fadeIn();
			$('#data_holder').fadeOut();
			$('#edit_holder').fadeOut();
		});

		$('#show_data_price').click(function(){
			$('#add_holder').fadeOut();
			$('#data_holder').fadeIn();
			$('#edit_holder').fadeOut();
		});

		$('#price_all_rec').on('click','.edit_rec',function(){
			var id = $(this).closest('tr').find('td:eq(0)').find('input[type=hidden]').val();
			var nama_paket = $(this).closest('tr').find('td:eq(2)').find('input[type=hidden]').val();
			var local = $(this).closest('tr').find('td:eq(3)').find('input[type=hidden]').val();
			var non_local = $(this).closest('tr').find('td:eq(4)').find('input[type=hidden]').val();
			var description = $(this).closest('tr').find('td:eq(5)').find('input[type=hidden]').val();

			$('#price_id').val(id);
			$('#nama_paket').val(nama_paket);
			$('#local').val(local);
			$('#non_local').val(non_local);
			$('#description').val(description);


			$('#add_holder').fadeOut();
			$('#edit_holder').fadeIn();
			$('#data_holder').fadeOut();

			$('#showPromptDelete').html('');
		});

		$('#price_all_rec').on('click','.delete_rec',function(){
			var id = $(this).closest('tr').find('td:eq(0)').find('input[type=hidden]').val();
			var nama = $(this).closest('tr').find('td:eq(2)').find('input[type=hidden]').val();
			var prompt = '<div class="alert alert-icon alert-danger" role="alert">'+
						 '<i class="fe fe-alert-triangle mr-2" aria-hidden="true"></i> Are you sure about to delete, <b>'+ nama + '</b> ? <br/>'+
						 '<form method="POST" action="{{ url("Price/destroy") }}">'+
						 '{{ csrf_field() }} <input type="hidden" name="price_id" value="'+id+'">'+
						 '<button type="submit" class="btn btn-danger">Yes</button> '+
						 '<button type="button" class="btn btn-success gagal_delete">No</button>'+
						 '</form>'+
						 '</div>';

			$('#showPromptDelete').html(prompt);
		});
		// END OF PRICE JQUERY

		// CUSTOMER JQUERY
		$('#add_data_customer').click(function(){
			$('#add_holder').fadeIn();
			$('#data_holder').fadeOut();
			$('#edit_holder').fadeOut();
		});

		$('#show_data_customer').click(function(){
			$('#add_holder').fadeOut();
			$('#data_holder').fadeIn();
			$('#edit_holder').fadeOut();
		});

		$('#customer_all_rec').on('click','.edit_rec',function(){
			var id = $(this).closest('tr').find('td:eq(0)').find('input[type=hidden]').val();
			var nama_perusahaan = $(this).closest('tr').find('td:eq(2)').find('input[type=hidden]').val();
			var alamat = $(this).closest('tr').find('td:eq(3)').find('input[type=hidden]').val();
			var no_telpon = $(this).closest('tr').find('td:eq(4)').find('input[type=hidden]').val();
			var kota = $(this).closest('tr').find('td:eq(5)').find('input[type=hidden]').val();

			$('#customer_id').val(id);
			$('#nama_perusahaan').val(nama_perusahaan);
			$('#alamat').val(alamat);
			$('#no_telpon').val(no_telpon);
			$('#kota').val(kota);


			$('#add_holder').fadeOut();
			$('#edit_holder').fadeIn();
			$('#data_holder').fadeOut();

			$('#showPromptDelete').html('');
		});

		$('#customer_all_rec').on('click','.delete_rec',function(){
			var id = $(this).closest('tr').find('td:eq(0)').find('input[type=hidden]').val();
			var nama = $(this).closest('tr').find('td:eq(2)').find('input[type=hidden]').val();
			var prompt = '<div class="alert alert-icon alert-danger" role="alert">'+
						 '<i class="fe fe-alert-triangle mr-2" aria-hidden="true"></i> Are you sure about to delete, <b>'+ nama + '</b> ? <br/>'+
						 '<form method="POST" action="{{ url("Customer/destroy") }}">'+
						 '{{ csrf_field() }} <input type="hidden" name="customer_id" value="'+id+'">'+
						 '<button type="submit" class="btn btn-danger">Yes</button> '+
						 '<button type="button" class="btn btn-success gagal_delete">No</button>'+
						 '</form>'+
						 '</div>';

			$('#showPromptDelete').html(prompt);
		});
		// END OF CUSTOMER JQUERY

		// TRANSACTION JQUERY
		$('#holder_list_paket').on('change','.cek_paket',function(){
			var hargaLokal = $(this).closest('.item_class').find('.local').text();
			var hargaNonLokal = $(this).closest('.item_class').find('.non_local').text();
			var id = $(this).closest('.item_class').find('.id_paket').text();
			var appendSet = '<select class="form-control ket_paket">'+
							'<option value="">-</option>'+
							'<option value="Lokal">Lokal</option>'+
							'<option value="Non-Lokal">Non Lokal</option>'+
							'</select>';

			if(this.checked){
				$(this).closest('.item_class').find('.appendSetting').html(appendSet);
				$(this).closest('.item_class').find('.result').append('<input type="hidden" class="paket_id" value="'+id+'" name="paket_id[]">');
			}else{
				$(this).closest('.item_class').find('.appendSetting').html('');
				$(this).closest('.item_class').find('.result').html('');
			}
		});

		$('.appendSetting').on('change','.ket_paket',function(){
			var ket = $(this).closest('.appendSetting').find('.ket_paket').val();
			var hargaLokal = $(this).parent().closest('.item_class').find('.local').text();
			var hargaNonLokal = $(this).parent().closest('.item_class').find('.non_local').text();

			if(!$(this).parent().closest('.item_class').find('.paket_input').val()){
				$(this).closest('.item_class').find('.result').append('<input type="hidden" class="paket_input" value="'+ket+'" name="ket[]">');

				if(ket == 'Lokal'){
					$(this).closest('.item_class').find('.result').append('<input type="hidden" class="paket_price" value="'+hargaLokal+'" name="price[]">');
				}else if(ket == 'Non-Lokal'){
					$(this).closest('.item_class').find('.result').append('<input type="hidden" class="paket_price" value="'+hargaNonLokal+'" name="price[]">');
				}

			}else if(ket == ''){
				$(this).parent().closest('.item_class').find('.paket_input').remove()
				$(this).parent().closest('.item_class').find('.paket_price').remove()
			}else{
				$(this).parent().closest('.item_class').find('.paket_input').val(ket);

				if(ket == 'Lokal'){
					$(this).parent().closest('.item_class').find('.paket_price').val(hargaLokal);
				}else if(ket == 'Non-Lokal'){
					$(this).parent().closest('.item_class').find('.paket_price').val(hargaNonLokal);
				}
			}
		});

		$('#calculate_ket').click(function(){
			var sum = 0;
			$('.paket_price').each(function(){
				sum += Number($(this).val());
			});
			$('#show_total_price').html(sum);

			var lokal = 0;
			var non_lokal = 0;
			
			$('.paket_input').each(function(){
				if($(this).val() == 'Lokal'){
					lokal += 1;
				}else if($(this).val() == 'Non-Lokal'){
					non_lokal += 1;
				}
			});

			$('#keterangan_price').html(lokal+' Lokal, dan '+non_lokal+' Non-Lokal.');
		});

		$('#data_customer').hide();

		$('#hide_data_customer').click(function(){
			$('#data_customer').fadeOut();
		});

		$('#open_table_customer').click(function(){
			$('#data_customer').fadeIn();
		});

		$('#customer_record').on('click','.pick_customer',function(){
			var id = $(this).closest('tr').find('td:eq(0)').find('input[type=hidden]').val();
			var nama_perusahaan = $(this).closest('tr').find('td:eq(2)').find('input[type=hidden]').val();
			var alamat = $(this).closest('tr').find('td:eq(3)').find('input[type=hidden]').val();

			$('#holder_id').html('<input type="hidden" name="customer_id" value="'+id+'">');
			$('#nama_cust').html('<input type="hidden" name="nama_perusahaan" value="'+nama_perusahaan+'">'+nama_perusahaan);
			$('#alamat_cust').html('<input type="hidden" name="alamat" value="'+alamat+'">'+alamat);
			$('#data_customer').fadeOut();
		});
		// END OF TRANSACTION JQUERY

	});
</script>