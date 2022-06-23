function idname(ele) {
	return document.getElementById(ele)
}

function add_quantity(id,user_id,quantity,total,sub_total){
 quantity_input = idname('quantity_'+id)
 add_quantities = quantity_input.value+1;
 quantity++
 formdata = new FormData()
 formdata.append('id',id)
 formdata.append('user_id',user_id)
 formdata.append('added_quantities',quantity)
 formdata.append('total_quantity',quantity)
 formdata.append('total',total)
 formdata.append('sub_total',sub_total)
 ajax = new XMLHttpRequest();
 ajax.open('POST','controller.php?request_type=add_quantity')
 ajax.onreadystatechange = function (evt) {
  
 }
 ajax.send(formdata)
}
function minux_quantity(id,user_id,quantity,total,sub_total){
 quantity_input = idname('quantity_'+id)
 if (quantity_input.value==1) {

 }else{
 	 add_quantities = quantity_input.value-1;
 }

 quantity--
 formdata = new FormData()
 formdata.append('id',id)
 formdata.append('user_id',user_id)
 formdata.append('deduted_quantities',quantity)
 formdata.append('total_quantity',quantity)
 formdata.append('total',total)
 formdata.append('sub_total',sub_total)
 ajax = new XMLHttpRequest();
 ajax.open('POST','controller.php?request_type=dedute_quantity')
 ajax.onreadystatechange = function (evt) {
  
 }
 ajax.send(formdata)
}
