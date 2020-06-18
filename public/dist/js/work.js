$("#vnro").blur(function(){
    revise_nroI();
});
$("#vnrol").blur(function(){  
    revise_nroI();
});
$("#vnros").blur(function(){  
    revise_nroI();
});

 function revise_nroI(){
    lnro=$("#vnrol").val();
    cnrol=$("#cvnrol").val();
    nro=$("#vnro").val();
    cnro=$("#cvnro").val();

    lnros=$("#vnros").val();
    cnros=$("#cvnros").val();
    ruta="/ingreso/revise_documento";

    if(lnro!=cnrol || nro!=cnro || lnros!=cnros){
      $.ajax({
          url: ruta,
          type:"GET",
          dataType:"json",
          data:{ lnro: lnro, lnros:lnros, valor: nro},
          success:function(data){
            // alert(data.nro_documento);
            if(data.nro_documento!=0){
              if(data.lnro!=null && data.lnros!=null ){
                toastr.warning("El numero "+data.lnro+data.lnros+"-"+data.nro_documento+" se encuentra registrado, agregue otro");
              }
              else if(data.lnro!=null){
                toastr.warning("El numero "+data.lnro+"-"+data.nro_documento+" se encuentra registrado, agregue otro");
              }
              else{
                toastr.warning("El numero "+data.nro_documento+" se encuentra registrado, agregue otro");
              }
              $("#vnro").val("");
              $("#vnrol").val("");
              $("#vnros").val("");
            }
          }
        });
    }
  }

$("a").tooltip({
  placement:"bottom",
}); 

$("button").tooltip({
  placement:"bottom",
}); 

$(".form-sal").hide().fadeIn(1000).delay(5000).slideUp(1000);
$(".form-error-val").hide().fadeIn(2000).delay(5000).fadeOut(1000);

$("#frm_company").validate({
  rules:{
    direccion:"required",
    telefono:"required",
    tipo:"required",
    nro:{
      required:true,
      number:true,
    },
    email:{
      required:true,
      email:true,
    },
    nombre:"required",
   
  },
  messages:{
    direccion:"requerido",
    telefono:"requerido",
    nro:{
      required:"requerido",
      number:"solo numeros"
    },
    tipo:"requerido",
    email:{
      required:"requerido",
      email:"correo no valido"
    },
    nombre:"requerido",
  },
  errorPlacement:function(error, element){     
    error.insertAfter(element);
  },
  submitHandler: function() {
    if(imgSize('myfile')){
        perror("Advertencia","La imagen que intenta subir pesa mas de 2Mb, por favor elija una de menor peso");
        return false;
    }
    else{
     return true;
    }
  }
});
$("#frm_process").validate({
  rules:{
    dperson:"required",
    dpersonp:"required",
    dnro:{
      required:true,
      number:true,
    },
    dnro_m:"required",
    merc:"required",
    fecha:{
      required:true
    }
  },
  messages:{
    dperson:"dato requerido",
    dpersonp:"dato requerido",
    dnro:{
      required:"dato requerido",
      number:"solo numeros"
    },
    dnro_m:"dato requerido",
    merc:"dato requerido",
    fecha:{
       required:"dato requerido"
    }
  },
  errorPlacement:function(error, element){
      if(element.is(":input.frm-gp")){
        error.insertBefore("div.frm-gp ");
      }
      else if(element.is(":input.frm-gf")){
        error.insertBefore("div.frm-gf ");
      }
      else if(element.is(":input.frm-gn")){
        alert("nu");
        error.insertBefore("div.frm-gn ");
      }
      else{
        error.insertBefore(element);
      }
  },
  submitHandler: function() {
    vi=$("#vista").val();
    if(vi=="cliente"){
      m="modal-client";
    }
    else if(vi=="proveedor"){
      m="modal-proveedor";
    }
    if($("#dperson_id").val()=="no"){
        // frm_personAdd(m);
        toastr.warning("Por favor guarde los datos, o seleccione a alguien que ya este registrado");
        return false;
    }
    else{
      total=parseFloat($("#tot").text());
      if(total<1){
        toastr.warning("Agregue productos para realizar el registro, el total debe ser mayor a 0");
        return false;
      }else{
        toastr.info("Verificando datos","Validando los valores introducidos");
        return true;
      }
    }
  }
});

// $("#frm_add").on("submit",function(e){
//   e.preveventDefault();
//   revise_nroI();
// });
$("#frm_add").validate({
  rules:{
    nombres:"required",
    cliente:"required",
    proveedor:"required",
    categoria:"required",
    codigo:"required",
    articulo:"required",
    producto:"required",
    usuario:"required",
    password:"required",
    contiene:"number",
    telefono:"number",
    email:{
      email:true,
      required:true
    },
    nro:{
      number:true,
      required:true
    },
    stock:{
      number:true,
      required:true
    },
    precio:{
      number:true,
      required:true
    }
  },
  messages:{
    nombres:"dato requerido",
    telefono:"solo numeros",
    usuario:"dato requerido",
    password:"dato requerido",
    cliente:"dato requerido",
    proveedor:"dato requerido",
    categoria:"dato requerido",
    codigo:"dato requerido",
    articulo:"dato requerido",
    producto:"dato requerido",
    contiene:"solo numeros",
    email:{
       email:"correo no valido",
       required:"dato requerido"
    },
    nro:{
       // number:"solo numeros",
       required:"dato requerido"
    },
    stock:{
       number:"valor numerico",
       required:"dato requerido"
    },
    precio:{
       number:"valor numerico",
       required:"dato requerido"
    }
  },
  errorPlacement:function(error, element){
      if(element.is(":input.frm-gn")){
        error.insertAfter("label.frm-gn ");
      }
      else{
        error.insertBefore(element);
      }
  },
  submitHandler: function() {
    toastr.info("Verificando datos","Validando los valores introducidos");
    return true;
  }
});
// $("#form_addPerson").validate({
//   rules:{
//     nombre:"required",
//     telefono:"number",
//     nit:"number",
//     nro:{
//       number:true,
//       required:true
//     }
//   },
//   messages:{
//     nombre:"dato requerido",
//     telefono:"solo numeros",
//     nit:"solo numeros",
//     nro:{
//        number:"solo numeros",
//        required:"minimo 5 digitos"
//     },
//   },
//   errorPlacement:function(error, element){
//       if(element.is(":input.frm-gn")){
//         error.insertAfter("label.frm-gn ");
//       }
//       else{
//         error.insertBefore(element);
//       }
//   },
//   submitHandler: function() {
//     pinfo("Verificando datos","Validando los valores introducidos");
//     // form_addPerson();
//     return false;
//   }
// });

$("#form_addPerson").submit(function(){
    var dat=new Array();
    dat[0]=$("#vista").val();
    dat[1]=$("#nombre").val();
    dat[2]=$("#telefono").val();
    dat[3]=$("#direccion").val();
    dat[4]=$("#nro").val();
    dat[5]=$("#nacionalidad").val();
    dat[6]=$("#entidad").val();

    dat[7]=$("#apellido").val();
    dat[8]=$("#nrol").val();
    dat[9]=$("#nit").val();
    dat[10]=$("#nros").val();
    nro=dat[4];
    vista=dat[0];
    // busca en tab person es valido ing,vent
    // if(vista=="proveedor"){
      ruta="/ingreso/revise_documento";

    $.ajax({
        url: ruta,
        type:"GET",
        dataType:"json",
        data:{ lnro: dat[8],lnros: dat[10], valor: nro},
        success:function(data){
          if(data.nro_documento!=0){
              if(data.lnro!=null && data.lnros!=null ){
                toastr.warning("El numero "+data.lnro+data.lnros+"-"+data.nro_documento+" se encuentra registrado, agregue otro");
              }
              else if(data.lnro!=null){
                toastr.warning("El numero "+data.lnro+"-"+data.nro_documento+" se encuentra registrado, agregue otro");
              }
              else{
                toastr.warning("El numero "+data.nro_documento+" se encuentra registrado, agregue otro");
              }
          }else{
            save_person(dat);
            del_error("dnro");
          }
        }
      });

    return false;
});
// }
$(".btn-doc").on("click",function(){
  vac=doc_data();
  clean_data(vac);
});
$("#frm_doc").submit(function(){
  vac=new Array();
  dat=new Array();
    vis=$("#vista").val();
    vac=doc_data();

    dat[0]=$("#idn").val();
    dat[1]=$("#nombre").val();
    dat[2]=$("#iva").val();
    if(vis=="documentop"){
      r=base_url+"adjust/Dperson/store";
      if(dat[0]!=""){
        r=base_url+"adjust/Dperson/update";
      }
    }
    else if(vis=="documentom"){
      r=base_url+"adjust/Mercantil/store";
      if(dat[0]!=""){
        r=base_url+"adjust/Mercantil/update";
      }
    }
    else if(vis=="entidad"){
      r=base_url+"adjust/Entity/store";
      if(dat[0]!=""){
        r=base_url+"adjust/Entity/update";
      }
    }
    frm_doc(r,dat,vac)
    return false;
});
function frm_doc(rut,dat,vac){
  vi=$("#vista").val();
  $.post(rut,
        {
          idn:dat[0],
          nombre:dat[1],
          iva:dat[2]
        },
    function(data){
        if(data){
          $("#modal-default").modal("hide");
          if(vi=="documentop"){
            tb_docu(base_url);
          }
          else if(vi=="documentom"){
            tb_mercantil(base_url);
          }
          else if(vi=="entidad"){
            tb_entity(base_url);
          }
          clean_data(vac);
          psuccess("Aviso","Se guardo el registro");
        }
        else{
          pnotice("Aviso","No se guardo, vuelva a realizar el proceso por favor");
        }
    });
}
function docUp(x){
  var d=x;
  dt=d.split("*");
  car=new Array();
  car=doc_data();
  $("#"+car[0]).val(dt[0]);
  $("#"+car[1]).val(dt[1]);
  $("#"+car[2]).val(dt[2]);
  $("#modal-default").modal("show");
}
function doc_data(){
  var da=new Array();
  da[0]="idn";
  da[1]="nombre";
  da[2]="iva";
  return da;
}
function doc_producto(){
  var da=new Array();
  da[0]="id_dproducto";
  da[1]="dproducto";
  da[2]="dstock";
  da[3]="dprecio";
  da[4]="dcantidad";
  da[5]="dfechav";
  da[6]="dpreciov";
  da[7]="dcategoria";
  da[8]="iddetallec";
  return da;
}
function clean_data(dat){
  for (var i=0; i<dat.length; i++) {
    // alert(dat[i]);
    $("#"+dat[i]).val("");
  }
}
function clean_person(){
  $("#nombre").val("");
  $("#telefono").val("");
  $("#direccion").val("");
  $("#email").val("");
  $("#nro").val("");

  $("#apellido").val("");
  $("#nrol").val("");
  $("#nit").val("");
  $("#nros").val("");
}
function save_person(x){
  dat=x;
  if(dat[0]=="cliente"){
    rut="/venta/ncliente";
    m="modal-cliente";
    per="dperson";
  }
  if(dat[0]=="proveedor"){
    rut="/ingreso/nproveedor";
    m="modal-proveedor";
    per="dpersonp";
  }
  $.ajax({
        url: rut,
        type:"GET",
        dataType:"json",
        data:{ nombres:dat[1],
              telefono:dat[2],
              direccion:dat[3],
              nro:dat[4],
              nacionalidad:dat[5],
              entidad:dat[6],
              apellidos:dat[7],
              lnro:dat[8],
              nit: dat[9],
              lnros:dat[10],
            },
        success:function(data){
          clean_person();
           if(data){
              toastr.info("Se registro satisfactoriamente");
              $("#"+per).val(data.nombre);
              a=data.idelegido;
              b=data.nro_documento;
              inac_per2(a,b,per);
              $("#"+m).modal("hide");
            }
            else{
              toastr.warning("No se guardo vuelva a intentar");
            }
        }
      });
}
function ver(a){
  var id=a;
  $.ajax({
    url:base_url + "supports/article/view/"+id,
    type:"POST",
    success:function(resp){
      $("#modal-default .modal-body").html(resp);
    }
  });
}
function viewData(x,y){
  var id=x;
  var rut="supports/"+y+"/view/";
  if(y=="sale" || y=="buy"){
    rut="processes/"+y+"/view/";
  }
  if(y=="user"){
    rut="admin/"+y+"/view/";
  }
  $.ajax({
    url:base_url + rut +id,
    type:"POST",
    success:function(resp){
      $("#modal-default .modal-body").html(resp);
    }
  });
}

function inac_per2(x,y,z){
  if(z=="dperson"){
    p="cliente";
  }
  if(z=="dpersonp"){
    p="proveedor";
  }
  $("#"+z).attr('disabled', 'disabled');
  $("#dnro").attr('disabled', 'disabled');
  $("#bus").replaceWith('<span class="input-group-btn" id="bus">'+
          '<button type="button" onclick="aut_ini(\''+z+'\' ,\''+'bus'+'\')" title="Cambiar de '+p+'" class="btn btn-default">'+
          '<i class="fa fa-refresh"></i></span></button>');
  $("#dperson_id").val(x);
  $("#dnro").val(y);
}
function inac_per(x,y){
  $("#dperson").attr('disabled', 'disabled');
  $("#dnro").attr('disabled', 'disabled');
  $("#bus").replaceWith('<span class="input-group-btn" id="bus">'+
          '<button type="button" onclick="aut_ini(\''+'dperson'+'\' ,\''+'bus'+'\')" title="Cambiar de cliente" class="btn btn-default">'+
          '<i class="fa fa-refresh"></i></span></button>');
  $("#dperson_id").val(x);
  $("#dnro").val(y);
}
function frm_personAdd(x){
  v=$("#vista").val();
  if(v=="cliente"){
    per=$("#dperson").val();
  }
  else if(v=="proveedor"){
    per=$("#dpersonp").val();
  }
  nro=$("#dnro").val();
  // $("#nombre").val(per);
  // $("#nro").val(nro);
  $("#"+x).modal({
      show:true,
      backdrop:false,
  });
}

// $("#nro").keyup(function(){
//   val =$(this).val();
//   nro=numberData(val);
//   $(this).val(nro);
// });
$("#dnro").keyup(function(){
  val =$(this).val();
  nro=numberData(val);
  $(this).val(nro);
});
$("#dnro").blur(function(){
  tip=$("#vista").val();
  per=$('#dperson').val();
  id=$('#dperson_id').val();
  if(id=="no" && per!=""){
    if(tip=="cliente"){
      mod="modal-client";
    }
    else if(tip=="proveedor"){
      mod="modal-proveedor";
    }
    frm_personAdd(mod);
    pnotice("Aviso","Por favor guarde los datos, o seleccione a alguien que ya este registrado");
  }
});

$("#dperson").keyup(function(event) {
  a=$(this).val();
  if(a==""){
    aut_ads('bus');
  }
});
$("#dpersonp").keyup(function(event) {
  a=$(this).val();
  if(a==""){
    aut_ads('bus');
  }
});
$(".bton-close").on('click', function() {
  $("#modal-client").removeClass('in');
  clean_person();
  // $("#dperson").focus();
});
function aut_ini(x,y){
  $("#"+x).removeAttr('disabled');
  $("#dnro").removeAttr('disabled');
  aut_ads(y);
  $("#"+x).val("");
  $("#"+x+"_id").val('no');
  $("#"+x).focus();
  $("#dnro").val("");
}
function aut_add(y){
  vi=$("#vista").val();
  if(vi=="cliente"){
    m="modal-client";
  }
  else if(vi=="proveedor"){
    m="modal-proveedor";
  }
  $("#"+y).replaceWith('<span class="input-group-btn" id="bus">'+
                      '<button type="button" onclick="frm_personAdd(\''+m+'\');" title="Agregar nuevo" class="btn btn-default">'+
                          '<i class="fa fa-plus"></i></button></span>');
}
function aut_ads(y){
  $("#"+y).replaceWith('<span class="input-group-btn" id="bus">'+
                          '<button onclick="search_person();" title="Buscar" type="button" class="btn btn-default">'+
                          '<i class="fa fa-search"></i></button></span>');
}
function search_person(){
  tip=$("#vistaSearch").val();
  if(tip=="cliente"){
    list_cliente();
    mod="modal-search-client";
  }
  if(tip=="proveedor"){
    list_proveedor();
    mod="modal-search-proveedor";
  }
  $("#"+mod).modal("show");
}
function sel_person(a,b,x){
  tip=$("#vistaSearch").val();
  if(tip=="cliente"){
    $("#dperson").val(x);
    mod="modal-search-client";
    id="dperson";
  }
  else if(tip=="proveedor"){
    $("#dpersonp").val(x);
    mod="modal-search-proveedor";
    id="dpersonp";
  }
  inac_per2(a,b,id);
  $("#"+mod).modal("hide");
  del_error(id);
  del_error("dnro");
}
function del_error(x){
  $("#"+x).removeClass('error');
  $("#"+x+"-error").remove();
}


$("#btn-adds").on("click",function(){
    d=$(this).val();
    var dataO=d.split("*");
    var dataR=dataAdd();
    sub=dataR[3]*dataR[4];
    if(dataR[0] !=""){
      if(!isNaN(dataR[3]) && !isNaN(dataR[4]) && dataR[4]>0){
        if(dataR[3]>=dataO[1]){
            if(dataR[4]<1){
              dataR[4]=1;
              sub=dataR[3]*dataR[4];
            }
            if(dataR[4]<=dataO[2]){
                if(!find_d(dataR[0])){
                html="<tr>";
                html +="<td>"+dataO[0]+"</td>";
                html +="<td><input type='hidden' name='idarticles[]' value='"+dataR[0]+"'>"+dataR[1]+"</td>";
                html +="<td><input type='hidden' name='prices[]' value='"+dataR[3]+"'>"+dataR[3]+"</td>";
                html +="<td><input type='text' name='quantities[]'  size='10' value='"+dataR[4]+"' class='quantities'></td>";
                html +="<td><input type='hidden' name='subtotals[]' value='"+sub.toFixed(2)+"'>"+sub.toFixed(2)+"</td>";
                html +="<td><input type='hidden' name='stock' value='"+dataO[2]+"'>";
                html +="<button class='btn btn-warning btn-xs btn-remove-art' type='button' title='Eliminar'><span class='fa fa-remove'></span></button></td>";
                html +="</tr>";
                $("#tbl-det tbody").append(html);
                plusDetail();
                clean();
              }
              else{
                pnotice("Aviso",'Ya esta en detalle, agregue otro articulo');
              }
            }
            else{
              pnotice("Aviso","Cantidad no disponible, agregue un valor menor");
              $("#dcantidad").val(1);
            }
        }
        else{
            pnotice("Aviso","El precio d venta debe ser igual o mayor al sugerido");
            $("#dprecio").val(dataO[1]);
        }
      }
      else{
        pnotice("Aviso","Por favor solo numeros validos en precio y cantidad");
        if(dataR[4]==0){
          $("#dcantidad").val(1);
        }
      }
    }
    else{
      pnotice("Aviso","Seleccione un articulo existente");
    }
  });

$(document).on("click",".btn-remove-art",function(){
  $(this).closest("tr").remove();
  plusDetail();
});
  
 $(document).on("focus","#tbl-det input.quantities", function(){
    $(this).select();
 });
 $(document).on("focusout","#tbl-det input.quantities", function(){
    st=$(this).closest("tr").find("td:eq(4)").children("input").val();
    stock=parseInt(st);
    
    vis=$("#vista").val();
    val=$(this).val();
    if(val==""){
      cantidad=1;
      $(this).val(cantidad);
    }else{
      ct=parseInt(val);
      if(vis=="cliente"){
        if(ct>stock){
          pnotice("Aviso","Cantidad no disponible agregue un valor menor");
           cantidad=1;
          $(this).val(cantidad);
        }  
      }
      else if(vis=="proveedor"){
        cantidad=ct;
      }
      
    }
    precio = $(this).closest("tr").find("td:eq(1)").text();
    importe = cantidad * precio;
    $(this).closest("tr").find("td:eq(4)").text(importe.toFixed(2));
    $(this).closest("tr").find("td:eq(4)").children("input").val(importe.toFixed(2));
    plusDetail();
 });

 $(document).on("keyup","#tbl-det input.quantities", function(){
    val =$(this).val();
    if(val !=""){
       if(!isNaN(val) && val>0){
          can=parseInt(val);
       }
       else{
          can=parseInt(val);
          if(isNaN(can) || can<1){
            can=1;
          }
       }
    }
    else{
      can="";
    }
    cantidad=can;

    $(this).closest("tr").find("td:eq(2)").children("input").val(cantidad);
    precio = $(this).closest("tr").find("td:eq(1)").text();
    importe = cantidad * precio;
    $(this).closest("tr").find("td:eq(4)").text(importe.toFixed(2));
    $(this).closest("tr").find("td:eq(4)").children("input").val(importe.toFixed(2));
    plusDetail();
});
function dataAdd(){
  var a=new Array();
  a[0]=$("#id_dproducto").val();
  a[1]=$("#dproducto").val();
  a[2]=$("#dcodigo").val(); 
  a[3]=parseFloat($("#dprecio").val());
  a[4]=parseInt($("#dcantidad").val());
  a[5]=$("#dfechav").val(); 
  a[6]=parseInt($("#dpreciov").val());
  a[7]=$("#dfecha").val(); 
  return a;
}
function find_d(x){
  var a=0;
  $("#tbl-det tbody tr").each(function(){
    var ex=$(this).find("td:eq(0)").children("input").val();
    if(ex==x){
       a=1;          
    }
  });
  if(a!=0){
    return true;
  }else{
    return false;
  }
}
$("#ddescuento").blur(function() {
  if($(this).val()>99){
    pnotice("Aviso","El descuento debe ser menor al 100%");
    $(this).val(1);
    plusDetail();
  }
});
$("#ddescuento").on("keyup",function(){
  val =$(this).val();
  nro=numberData(val);
  $(this).val(nro);
  plusDetail();
});
function helpNro(id){
  var token=$("#token").val();
  tip=$("#vistaSearch").val();
  if(tip=="cliente"){
      url="/venta/comprobante";
  }else{
      url="/ingreso/comprobante";
  }
  $.ajax({
      url: url,
      headers:{'X-CSRF-TOKEN':token},
      type:"GET",
      dataType:"json",
      data:{ valor: id},
      success:function(data){
        $("#dnro_m").val(data.nro);
        // response(data.idcomprobante);
      }
    });
}
$(".mercantile").on('change', function() {
    info=$(this).val();
    if(info!=""){
      data=info.split("*");
      $("#dmercantile_id").val(data[0]);
      // $("#dimpuesto").val(data[1]);
      helpNro(data[0]);
      del_error("dnro_m");
    }
    else{
      $("#dnro_m").val("");
      $("#dmercantile_id").val("");
      $("#dimpuesto").val(0);
    }
    // plusDetail();
});
$("#dnro_m").blur(function() {
  nro=$(this).val();
  idm=$("#dmercantile_id").val();
  tip=$("#vistaSearch").val();
  if(tip=="cliente"){
    url="/venta/revise_nro";
  }else{
    url="/ingreso/revise_nro";
  }
  if(nro!="" && idm!=""){
      $.ajax({
        url: url,
        type:"GET",
        dataType:"json",
        data:{ nro: nro, idm: idm},
        success:function(data){
          if(data.nro_documento >0){
            toastr.warning("El numero "+data.nro_documento+" se encuentra registrado, agregue otro o el recomendado");
            helpNro(idm);
          }
        }
      });
  }
  else if(idm!=""){
    helpNro(idm);
    del_error("dnro_m");
  }
});
$("#dnro_m").on("keyup",function(){
  val =$(this).val();
  nro=numberData(val);
    $(this).val(nro);
});
function numberData(dat){
  if(dat !=""){
     if(!isNaN(dat) && dat>0){
        can=parseInt(dat);
     }
     else{
        can=parseInt(dat);
        if(isNaN(can) || can<1){
          can="";
        }
     }
  }
  else{
    can="";
  }
  return can;
}
function clean(){
    $("#id_darticulo").val("");
    $("#darticulo").val("");
    $("#dcodigo").val("");
    $("#dstock").val("");
    $("#dprecio").val("");
    $("#dcantidad").val("");
}
function plusDetail(){
    subtotal=0;
    $("#tbl-det tbody tr").each(function(){
      subtotal=subtotal+ Number($(this).find("td:eq(4)").text());
    });
    $("input[name=subtotal]").val(subtotal.toFixed(2));
    imp=$("#dimpuesto").val();
    if(imp!=""){
      impuesto=subtotal*(parseInt(imp)/100);
    }
    else{
      impuesto=0;
    }
    des=$("#ddescuento").val();
    if(des!=""){
      descuento=subtotal*(parseInt(des)/100);
    }
    else{
      descuento=0;
    }
    $("input[name=impuesto]").val(impuesto.toFixed(2));
    $("input[name=descuento]").val(descuento.toFixed(2));
    // total=subtotal+impuesto-descuento;
    total=subtotal;
    $("input[name=total]").val(total.toFixed(2));
    $("#tot").text(total.toFixed(2));
  }
function psuccess(w,x){
  new PNotify({
      title: w,
      text: '<hr class="notifys">'+x,
      type: 'success',
      styling: 'bootstrap3',
      delay:2000,
      animate: {
        animate:true,
        in_class:'zoomInleft',
        out_class: 'bounceOutRight'
      }
  });
}
// in_class:'zoomInLeft',
// out_class: 'zoomOutRight'
// in_class:'slideInDown',
// out_class: 'slideOutup'
function pinfo(x,y){
  new PNotify({
        title: x,
        text: '<hr class="notifys">'+y,
        type: 'info',
        styling: 'bootstrap3',
        delay:2000,
    });
}
function pnotice(x,y){
  new PNotify({
      title: x,
      text: '<hr class="notifys">'+y,
      styling: 'bootstrap3',
      delay:2000,
  });
}
function perror(x,y){
  new PNotify({
      title: x,
      text: '<hr class="notifys">'+y,
      type: 'error',
      styling: 'bootstrap3',
      delay:2000,
  });
}
function pdark(x,y){
  new PNotify({
      title: x,
      text: y,
      type: 'info',
      styling: 'bootstrap3',
      addclass: 'dark',
      delay:2000,
  });
}




// onclick="alerta(\''+row.rownum+'\',\''+row.nombres+'\');"
function reloadSis(){
  window.location.reload();
}
$(document).on("click",".btn-print",function(){
  $("#fac").print({
    title:"Comprobante",
  });
});
$(document).on("click",".btn-printr",function(){
  $("#facr").print({
    noPrintSelector:".no-print",
    title:"Reporte"
  });
});
$(".btn-export").on("click",function(e){
  bus=$("#tblReports_filter input.input-sm").val();
  tot=$("#tot").text();
  regs=parseInt($("#regs").val());
  if(tot>0){
    if(regs<=15000){
      if(bus=="" || bus==" " || bus=="  "){
        bus="todos";
      }
      fech=dates_exp();
      data=fech+"_"+bus;
      rep=$("#reporte").val();
      if(rep=="salida"){
        rut="reports/sales/generar_excel/";
      }
      else if(rep=="ingreso"){
        rut="reports/buys/generar_excel/";
      }
      $(this).attr('href', base_url+rut+data);
      return true;
    }
    else{
      pnotice("Aviso","Cantidad de registros muy grande, supera los 15000 registros, elija un rango de fechas menor");
      return false;
    }
  }
  else{
    pnotice("Aviso","No hay registros para exportar");
    return false;
  }
});
$(".btn-exportk").on("click",function(e){
  ida=$("#id_dart").val();
  year=$("#year").val();
  info=$("#tblReports_info").text();
  regs=parseInt($("#regs0").val());
  if(ida!=""){
    if(regs>0){
      if(regs<=15000){
        data=ida+"_"+year;
        rut="reports/articles/generar_excel/";
        $(this).attr('href', base_url+rut+data);
        // return true;
      }
      else{
        pnotice("Aviso","Cantidad de registros muy grande, supera los 15000 registros");
        return false;
      }
    }
    else{
      pnotice("Aviso","No hay registros para exportar");
      return false;
    }
  }else{
    pnotice("Aviso","Por favor realice la busqueda de un articulo existente para exportar sus registros");
    return false;
  }
});
function dates_trans(x){
  da=$("#"+x).val().split("/");
  fechx=da[2]+"-"+da[1]+"-"+da[0];
  return fechx;
}
function dates_exp(){
  fe=dates_trans("fe");
  feh=dates_trans("fec");
  return fe+"_"+feh;
}
function dates_form(){
  fech=$("#fecha").val();
  fech2=$("#fechah").val();
  dat_fe=new Array();
  if(fech!="" && fech2!=""){
    $("#fe").val(fech);
    $("#fec").val(fech2);
    fe=dates_trans("fecha");
    feh=dates_trans("fechah");
    dat_fe[0]=fe;
    dat_fe[1]=feh;
  }
  else{
    dat_fe[0]="";
    dat_fe[1]="";
  }
  return dat_fe;
}

function datavalor(ms,a,va){
  z=new Array();
  for (var i =0;i< ms.length; i++) {
    c=0;
    for (var j =0; j< a.length; j++) {
      if(ms[i]==a[j]){
        z[i]=va[j];
        c=1;
      }
    }
    if(c==0){
      z[i]=0;
    }
  }
  return z;
}
function combine_m(a,b){
  for (var i =0;i< a.length; i++) {
    c=0;
    for (var j =0; j< b.length; j++) {
      if(a[i]==b[j]){
        c=1;
      }
    }
    if(c==0){
      b.push(a[i]);
    }
  }
  return b;
}
function order_m(ms,a){
  z=new Array();
  cz=0;
  for (var i =0;i< ms.length; i++) {
    c=0;
    for (var j =0; j< a.length; j++) {
      if(ms[i]==a[j]){
        c=1;
      }
    }
    if(c==1){
      z[cz]=ms[i];
      cz++
    }
  }
  return z;
}

function data_grafic(base_url,year){
  namesMonth=["Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic"];
  $.ajax({
      url:base_url+"dashboard/getData",
      type:"POST",
      data:{year:year},
      dataType:"json",
      success:function(res){
          var meses=new Array();
          var mesesb=new Array();
          var montos=new Array();
          var montosb=new Array();
          $.each(res.sali,function(key,value){
              meses.push(namesMonth[value.mes-1]);
              valor=Number(value.monto);
              montos.push(valor);
          });
           $.each(res.buy,function(key,value){
              mesesb.push(namesMonth[value.mes-1]);
              valor=Number(value.monto);
              montosb.push(valor);
          });
          combine=combine_m(meses,mesesb);
          mess=order_m(namesMonth,combine);

          datos=datavalor(mess,meses,montos);
          datosb=datavalor(mess,mesesb,montosb);
          draw_tab(mess,datos,datosb,year);
      }
  });
}
function draw_tab(meses,mons,montb,year) {
  if( typeof (echarts) === 'undefined'){ return; }
  // console.log('init_echarts');
  var theme = {
  color: [
    '#6990CB', '#A1D188', '#7892D5', '#95F86D',
    '#2BC7A6', '#3D5F81', '#BDC3C7', '#2393DE'
  ],

  title: {
    itemGap: 8,
    textStyle: {
      fontWeight: 'normal',
      color: '#408829'
    }
  },

  dataRange: {
    color: ['#1f610a', '#97b58d']
  },

  toolbox: {
    color: ['#408829', '#408829', '#408829', '#408829']
  },

  tooltip: {
    backgroundColor: 'rgba(0,0,0,0.5)',
    axisPointer: {
      type: 'line',
      lineStyle: {
        color: '#408829',
        type: 'dashed'
      },
      crossStyle: {
        color: '#408829'
      },
      shadowStyle: {
        color: 'rgba(200,200,200,0.3)'
      }
    }
  },

  dataZoom: {
    dataBackgroundColor: '#eee',
    fillerColor: 'rgba(64,136,41,0.2)',
    handleColor: '#408829'
  },
  grid: {
    borderWidth: 0
  },

  categoryAxis: {
    axisLine: {
      lineStyle: {
        color: '#408829'
      }
    },
    splitLine: {
      lineStyle: {
        color: ['#EADCBB']
      }
    }
  },

  valueAxis: {
    axisLine: {
      lineStyle: {
        color: '#88293F'
      }
    },
    splitArea: {
      show: true,
      areaStyle: {
        color: ['rgba(250,250,250,0.1)', 'rgba(200,200,200,0.1)']
      }
    },
    splitLine: {
      lineStyle: {
        color: ['#eee']
      }
    }
  },       
  textStyle: {
    fontFamily: 'Arial, Verdana, sans-serif'
  }
};        
  
//echart
    var echartBar = echarts.init(document.getElementById('mainb'), theme);
    echartBar.setOption({
    title: {
      text: '',
      subtext: 'Monto ( Bs )'
    },
    tooltip: {
      // trigger: 'axis'
      trigger: 'item'
    },
    legend: {
      data: ['Ingresos', 'Salidas']
    },
     toolbox: {
      show: true,
      feature: {
        saveAsImage: {
          show: true,
          title: "Descargar Imagen"
        }
      }
  },
    calculable: false,
    xAxis: [{
      type: 'category',
      data: meses,
    }],
    yAxis: [{
      type: 'value'
    }],
    series: [
    {
        name: 'Ingresos',
        type: 'bar',
        data: montb,
        itemStyle: {
                normal: {
                    barBorderColor: '#5E88AC',
                    barBorderWidth: 2,
                    barBorderRadius:0,
                    label : {
                        show: true, position: 'top'
                    }
                }
            }
      },
      {
        name: 'Salidas',
        type: 'bar',
        data: mons,
        itemStyle: {
                normal: {
                    // color: 'tomato',
                    barBorderColor: '#5ACB7D',
                    barBorderWidth: 2,
                    barBorderRadius:0,
                    label : {
                        // show: true, position: 'insideTop'
                        show: true, position: 'top'
                    }
                }
            }
      },
    ]
    });     
  }

  function imgSize(x){
      ar=document.getElementById(x).files[0];
      if(ar!=undefined){ //bytes
        if(ar.size>2098000){
          return true;
        }
      }
      else{
        return false;
      }
    }

 $("#usuarioId").blur(function() {
  // usu=$(this).val();
  alert("usuarioss");
  // $.post(base_url+"processes/Autodata/revise_nro",
  //     {idmercantile:idm,
  //      tipo:tip,
  //      nro:nro
  //     },
  //   function(data){
  //       if(data){
  //         pnotice("Aviso","El numero "+nro+" se encuentra registrado, agregue otro o el recomendado");
  //         helpNro(idm);
  //       }
  //   });
  });


$("#categoria").on('change', function() {
    $("#insumo").hide();
    $("#material").hide();
    $("#unidad").hide();

    $("#contiene").attr('disabled', 'true');
    $("#amaterial").attr('disabled', 'true');
    $("#tipo").attr('disabled', 'true');
    
    producto=$("#categoria option:selected").text();
    if(producto=="Insumos"){
      $("#unidad").hide().fadeIn(2000);
      $("#tipo").removeAttr('disabled');
    }
    if(producto=="Instrumentos"){
      $("#material").hide().fadeIn(2000);
      $("#amaterial").removeAttr('disabled');
    }    
});
$("#dpreciov").blur(function() {
  preciov=parseFloat($(this).val());
  precioc=parseFloat($("#dprecio").val());
  if(preciov > 0){
    if(precioc > 0 && precioc > preciov ){
      toastr.warning("El precio de venta debe ser mayor al precio de compra");
      $(this).val("");
    }
  }
  else{
    toastr.warning("No es un numero valido, el valor debe ser mayor al precio de compra");
    $(this).val("");
  }
});
$("#fecha").blur(function(){
  fecha=$(this).val();
  cam="fecha";
  compare_fecha(fecha,cam);
});
$("#dfechav").blur(function(){
  fecha=$(this).val();
  cam="dfechav";
  compare_fecha(fecha,cam);
});

function compare_fecha(f,c){
  fecha=f;
  actual=fecha_actual();

  nuevo=Date.parse(fecha);
  hoy=Date.parse(actual);
  if(nuevo<hoy){
    toastr.warning("Introduzca una fecha valida, no pasada");
    $("#"+c).val("");
  }
}
function fecha_actual(){
  hoy=new Date();
  anio=hoy.getFullYear();
  mes=hoy.getMonth()+1;
  dia=hoy.getDate();
  if(mes<10){
    mes="0"+mes;
  }
  if(dia<10){
    dia="0"+dia;
  }
  actual=anio+"-"+mes+"-"+dia;
  return actual;
}

function reportes(id,fe,fe2){
  toastr.options={
      "closeButton":true,
      "progressBar":true,
      "timeOut":"3000",
      "preventDuplicates":true
    };
  var idper=$("#"+id).val();
  var fec=$("#"+fe).val();
  var fec2=$("#"+fe2).val();

  ur=$("#vista").val();

  if(fec!="" && fec2!=""){
    $("#contenidoj").hide();
    url=ur+"/"+idper+"/"+fec+"/"+fec2;
    $.get(url,function(data){
      $("#contenidoj").html(data);
    });
    $("#contenidoj").hide().fadeIn(2000);
  }else{
    toastr.warning("llene los datos por favor");
  }
}

$("#idbutton").on("click",function(){
  $("#idnav").addClass("top-nav-collapse");
});

$("#nit").blur(function(){  
    nit=$(this).val();
    onit=$("#onit").val();
    ruta="/proveedor/reviseNit";

    if(nit!=onit && nit!=""){
      $.ajax({
          url: ruta,
          type:"GET",
          dataType:"json",
          data:{valor: nit},
          success:function(data){
            if(data.nit!=0 && data.nit!=null){
                toastr.warning("El numero "+data.nit+" se encuentra registrado, agregue otro");
              $("#nit").val("");
            }
          }
        });
    }
});

function validar(a,b){
    var let="abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
    var num=".,0123456789";
    var p="";
    switch(b){
        case 1:
          b=let;
          p=" letras";
          break;
        case 2:
          b=num;
          p=" numeros";
          break;
    }
    var evento=a|| window.event;
    var codigo=evento.charCode|| evento.keyCode;
    // alert(codigo);
    var caracter=String.fromCharCode(codigo);

    var especiales=[8,9,32,37,38,39,40];
    var especial=false;

    for(var i in especiales){
          if(codigo==especiales[i]){
              especial=true;
          }
       }

    if(especial==false){
              if(b.indexOf(caracter)==-1){
                        // alert(' solo se permite '+p);
                        toastr.warning("solo se permite "+p);
              }
    }
  return b.indexOf(caracter)!=-1 || especial==true;
}