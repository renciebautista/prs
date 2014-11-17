$(document).ready(function(){
	$.fn.ajaxsearch = function(option) {
		$(this).focus();
		$(this).keyup(function(){
			var search = $(this).val();
			var row ='<table class="table table-striped table-hover">';
				row +='<thead>';
				row +='<tr>';
				row +='<th>Contact Name</th>';
				row +='<th>Account Name</th>';				
				row +='<th style="text-align:center;">Action</th>';					
				row +='</tr>';					
				row +='</thead>';				
				row +='<tbody>';			
			$.getJSON(option.url, { 'search': search}, function(data) {
				if(data['contacts'].length > 0){
					$.each(data['contacts'],function(key,value){
						var contact_name = value.first_name+' '+value.middle_name+' '+value.last_name;
			            row+='<tr>';
			            row+='<td>'+contact_name.toLowerCase()+'</td>';
						row+='<td>'+$.trim(value.account_name)+'</td>';		
						row+='<td class="action">';				
						row+='';					
						row+='</td>';						
						row+='</tr>';				
			        });
				}else{
					row+='<tr>';
		            row+='<td colspan="3">No record found.</td>';					
					row+='</tr>';	
				}
				row+='</tbody></table>';
				$(option.result).html(row);
		        $(option.result).css('textTransform', 'capitalize');
			}); 
		});
		$(this).keyup();
	};
});