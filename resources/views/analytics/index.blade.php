@extends('layouts.main_layout')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-3">
        <h1>
          Analytics
        </h1>
      </div>
      <div class="col-sm-9">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active">Analytics</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content" >
  <div class="card" id="app">
    <div class="card-header">
      <h3 class="card-title">
        Monthly Analytics
      </h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fas fa-times"></i></button>
      </div>
    </div>
    <div class="card-body">
      <form method="post" action="{{ route('get_analytics_listing') }}">
        @csrf
        <div class="input-group mb-3">
          <select id="items" name="analytics_id" class="custom-select" style="width: 100px;">
            @foreach($analytics_listings as $keys => $lists)
                @php
                  if(isset($analytics_selected)) {
                    $selected = $analytics_selected;
                  } else {
                    $selected = '';
                  }
                @endphp
                <option id="{{$keys}}" value="{{$keys}}" {{ ( $selected == $keys) ? 'selected' : '' }}>{{$lists}}</option>
            
            @endforeach
          </select>
          <div class="input-group-append">
            <div class="btn-group">
              <button type="submit" class="btn btn-sm btn-danger w-100 submit_btn"><i class="fas fa-search-dollar"> </i></button>
              @if($results ?? '')
                @if(count($results) > 0)

                  <a id="print_link" target="_blank" class="btn btn-sm btn-danger pt-2"><i class="fas fa-print"> </i></a>
                  <input type="hidden" value="print" name="print">
                  <input type="hidden" value="{{$analytics_selected}}_print" name="analytics_id_print">
                  <input type="hidden" name="fromDate" class="fromDateHidden">
                  <input type="hidden" name="toDate" class="toDateHidden">
                @endif
              @endif
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <!-- <div class="input-group" id="analytics_from_and_to_date" data-target-input="nearest">
            <input type="text" class="form-control"
                autocomplete="off"
                name="analytics_from_and_to_date" data-target="#analytics_from_and_to_date" 
                data-placement="top" rel="tooltip" 
                title="Click the icon on the right side to display the calendar" 
                data-original-title="Click the icon on the right side to display the calendar">
          </div> -->
            <div class="input-group analytics_date">
              <input type="text"
                class="form-control float-right" id="analytics_from_and_to_date"
                name="analytics_from_and_to_date"
                autocomplete="off"
                data-placement="top" rel="tooltip" 
                title="Click the icon on the right side to display the calendar" 
                data-original-title="Click the icon on the right side to display the calendar"
              >    
              <div class="input-group-prepend">
                <span class="input-group-text" 
                  data-placement="top" rel="tooltip" 
                  title="Click the icon on the right side to display the calendar" 
                  data-original-title="Click the icon on the right side to display the calendar"
                >
                  <i class="far fa-calendar-alt"></i>
                </span>
              </div>
            </div>
        </div>

        @if($results ?? '')
          @if($analytics_selected == 'monthly_sales_report')
            <div style="overflow-x:auto;">
              <table id="analytics2" class="table table-bordered table-striped text-center" width="100%">
                <thead>
                  <tr>
                    <!-- <th>Sale #</th> -->
                    <th width="5%">DR #</th>
                    <th>Client</th>
                    <th>Item</th>
                    <th>Cost</th>
                    <th>Discount</th>
                    <th>Additional Fee</th>
                    <th>Quantity</th>
                    <th>Total Cost</th>
                    <th>Paid Date</th>
                    <th>Sold Date</th>
                    <th>Sold By</th>
                    <th>Payment Method</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($results as $value)
                  <tr>
                    <!-- <td>{{$value->sale_no}}</td> -->
                    <td>{{$value->delivery_no}}</td>
                    <td>{{$value->client_name}}</td>
                    <td>{{$value->item_name}}</td>
                    <td>{{$value->cost}}</td>
                    <td>{{$value->discount}}</td>
                    <td>{{$value->additional_fee}}</td>
                    <td>{{$value->quantity}}</td>
                    <td>{{$value->total_cost}}</td>
                    <td>
                      {{$value->paid_on ? date('m/d/Y', strtotime($value->paid_on)) : '' }}
                    </td>
                    <td>
                      {{date('m/d/Y', strtotime($value->added_on)) }}  
                    </td>
                    <td>{{$value->added_by}}</td>
                    <td>{{$value->description}}</td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <!-- <th>Sale #</th> -->
                    <th>DR #</th>
                    <th>Client</th>
                    <th>Item</th>
                    <th>Cost</th>
                    <th>Discount</th>
                    <th>Additional Fee</th>
                    <th>Quantity</th>
                    <th>Total Cost</th>
                    <th>Paid Date</th>
                    <th>Sold Date</th>
                    <th>Sold By</th>
                    <th>Payment Method</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          @elseif($analytics_selected == 'purchases_vs_sales')
          <div style="overflow-x:auto;">
              <table id="analytics2" class="table table-bordered table-striped text-center" width="100%">
                <thead>
                  <tr>
                    <th>Purchase Date</th>
                    <th>Delivery #</th>
                    <th>Item</th>
                    <th>Purchase Quantity</th>
                    <th>Sold Quantity</th>
                    <th>Unsold Quantity</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($results as $value)
                  <tr>
                    <td>
                      {{$value->purchase_date ? date('m/d/Y', strtotime($value->purchase_date)) : '' }}
                    </td>
                    <td>{{$value->dr_no}}</td>
                    <td>{{$value->item_name}}</td>
                    <td>{{$value->purchase_qty}}</td>
                    <td>{{$value->sold_qty}}</td>
                    <td>{{$value->unsold_qty}}</td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>Purchase Date</th>
                    <th>Delivery #</th>
                    <th>Item</th>
                    <th>Purchase Quantity</th>
                    <th>Sold Quantity</th>
                    <th>Unsold Quantity</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            @elseif($analytics_selected == 'item_costs_history')
            <div style="overflow-x:auto;">
              <table id="analytics2" class="table table-bordered table-striped text-center" width="100%">
                <thead>
                  <tr>
                    <th>Item</th>
                    <th>Cost</th>
                    <th>Cost Datetime</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($results as $value)
                  <tr>
                    <td>{{$value->item_name}}</td>
                    <td>{{$value->cost}}</td>
                    <td>
                      {{$value->cost_datetime ? date('m/d/Y h:i:s A', strtotime($value->cost_datetime)) : '' }}
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>Item</th>
                    <th>Cost</th>
                    <th>Cost Datetime</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            @elseif($analytics_selected == 'monthly_utilities')
            <div style="overflow-x:auto;">
              <table id="analytics2" class="table table-bordered table-striped text-center" width="100%">
                <thead>
                  <tr>
                    <th>Utility</th>
                    <th>Cost</th>
                    <th>Coverage</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($results as $value)
                  <tr>
                    <td>{{$value->utility}}</td>
                    <td>{{$value->cost}}</td>
                    <td>
                      @if(isset($value->from_date))
                        {{$value->from_date ? date('M Y', strtotime($value->from_date)) : '' }} - {{$value->to_date ? date('M Y', strtotime($value->to_date)) : '' }}
                      @endif
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>Item</th>
                    <th>Cost</th>
                    <th>Coverage</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          @endif

        @endif
      </form>
    </div>
  </div>
</section>

<script>
  $("#items").change(function(){
    if($('#items').val() == 'item_costs_history') {
      $('.analytics_date').hide()
    } else {
      $('.analytics_date').show()
    }
  });

  $(".submit_btn").click(function(){
    const dates = $("#analytics_from_and_to_date").val();
    const splittedDates = dates.split('-');
    localStorage.setItem("fromDate", splittedDates[0]);
    localStorage.setItem("toDate", splittedDates[1]);
  });

  if(localStorage.getItem("fromDate") != '' || localStorage.getItem("toDate") != '') {
    const fromDate = localStorage.getItem("fromDate");
    const toDate = localStorage.getItem("toDate");
    const arrDate = [fromDate, toDate];
    const joinDate = arrDate.join('-');
    $('#analytics_from_and_to_date').val(joinDate);
    $('.fromDateHidden').val(fromDate);
    $('.toDateHidden').val(toDate);

    const fromD = new Date(localStorage.getItem("fromDate"))
    const fromYe = new Intl.DateTimeFormat('en', { year: 'numeric' }).format(fromD)
    const fromMo = new Intl.DateTimeFormat('en', { month: '2-digit' }).format(fromD)
    const fromDa = new Intl.DateTimeFormat('en', { day: '2-digit' }).format(fromD)
    const finalFromDate = `${fromYe}-${fromMo}-${fromDa}`

    const toD = new Date(localStorage.getItem("toDate"))
    const toYe = new Intl.DateTimeFormat('en', { year: 'numeric' }).format(toD)
    const toMo = new Intl.DateTimeFormat('en', { month: '2-digit' }).format(toD)
    const toDa = new Intl.DateTimeFormat('en', { day: '2-digit' }).format(toD)
    const finalToDate = `${toYe}-${toMo}-${toDa}`
    
    const finalArrDate = [finalFromDate, finalToDate].join('&');
    const finalDate = finalArrDate.replace(' ', '').replace(' ', '');
    
    <?php if(isset($analytics_selected)) { ?>
      <?php if($analytics_selected == 'item_costs_history') { ?>
        var url = '<?php echo $analytics_selected; ?>'+'_print';
        $("#print_link").attr("href", url);
      <?php } else { ?>
        var url = '<?php echo $analytics_selected; ?>'+'_print'+'/'+finalDate;
        $("#print_link").attr("href", url);
      <?php } ?>
    <?php } ?>
  }
  
</script>

@endsection