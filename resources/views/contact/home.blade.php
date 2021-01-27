@extends('contact.layouts.homeAccueil')

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
      <div class="container" style="display: inline-block;" >
        <div class="tile_count">
          <div class="col-md-2 col-sm-4  tile_stats_count">
            <span class="count_top"><i class="fa fa-users"></i> Total Users</span>
            <div class="count">{{$users->count()}}</div>
          </div>
          <div class="col-md-2 col-sm-4  tile_stats_count">
            <span class="count_top"><i class="fa fa-users"></i> Users inactif</span>
            <div class="count red">{{$usersInactifs->count()}}</div>
          </div>
          <div class="col-md-2 col-sm-4  tile_stats_count">
            <span class="count_top"><i class="fa fa-users"></i> Users actif</span>
            <div class="count green">{{$usersActifs->count()}}</div>
          </div>
          <div class="col-md-2 col-sm-4  tile_stats_count">
            <span class="count_top"><i class="fa fa-comment"></i> Rendez-vous</span>
            <div class="count">{{$rdvs->count()}}</div>
          </div>
          <div class="col-md-2 col-sm-4  tile_stats_count">
            <span class="count_top"><i class="fa fa-calculator"></i> Simulateurs</span>
            <div class="count">{{$simulateurs->count()}}</div>
          </div>
          <div class="col-md-2 col-sm-4  tile_stats_count">
            <span class="count_top"><i class="fa fa-calculator"></i>Simulateurs actifs</span>
            <div class="count green">{{$simulateurActif->count()}}</div>
          </div>
        </div>
        <div class="row">
          <div class="table-responsive">
            <table class="table table-striped jambo_table bulk_action">
              <thead>
                <tr class="headings">
                  <th>
                    <input type="checkbox" id="check-all" class="flat">
                  </th>
                  <th class="column-title">Invoice </th>
                  <th class="column-title">Invoice Date </th>
                  <th class="column-title">Order </th>
                  <th class="column-title">Bill to Name </th>
                  <th class="column-title">Status </th>
                  <th class="column-title">Amount </th>
                  <th class="column-title no-link last"><span class="nobr">Action</span>
                  </th>
                  <th class="bulk-actions" colspan="7">
                    <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                  </th>
                </tr>
              </thead>

              <tbody>
                <tr class="even pointer">
                  <td class="a-center bulk_action">
                    <input type="checkbox" class="flat" name="table_records">
                  </td>
                  <td class=" ">121000040</td>
                  <td class=" ">May 23, 2014 11:47:56 PM </td>
                  <td class=" ">121000210 <i class="success fa fa-long-arrow-up"></i></td>
                  <td class=" ">John Blank L</td>
                  <td class=" ">Paid</td>
                  <td class="a-right a-right ">$7.45</td>
                  <td class=" last"><a href="#">View</a>
                  </td>
                </tr>
                <tr class="odd pointer">
                  <td class="a-center bulk_action">
                    <input type="checkbox" class="flat" name="table_records">
                  </td>
                  <td class=" ">121000039</td>
                  <td class=" ">May 23, 2014 11:30:12 PM</td>
                  <td class=" ">121000208 <i class="success fa fa-long-arrow-up"></i>
                  </td>
                  <td class=" ">John Blank L</td>
                  <td class=" ">Paid</td>
                  <td class="a-right a-right ">$741.20</td>
                  <td class=" last"><a href="#">View</a>
                  </td>
                </tr>
                <tr class="even pointer">
                  <td class="a-center ">
                    <input type="checkbox" class="flat" name="table_records">
                  </td>
                  <td class=" ">121000038</td>
                  <td class=" ">May 24, 2014 10:55:33 PM</td>
                  <td class=" ">121000203 <i class="success fa fa-long-arrow-up"></i>
                  </td>
                  <td class=" ">Mike Smith</td>
                  <td class=" ">Paid</td>
                  <td class="a-right a-right ">$432.26</td>
                  <td class=" last"><a href="#">View</a>
                  </td>
                </tr>
                <tr class="odd pointer">
                  <td class="a-center ">
                    <input type="checkbox" class="flat" name="table_records">
                  </td>
                  <td class=" ">121000037</td>
                  <td class=" ">May 24, 2014 10:52:44 PM</td>
                  <td class=" ">121000204</td>
                  <td class=" ">Mike Smith</td>
                  <td class=" ">Paid</td>
                  <td class="a-right a-right ">$333.21</td>
                  <td class=" last"><a href="#">View</a>
                  </td>
                </tr>
                <tr class="even pointer">
                  <td class="a-center ">
                    <input type="checkbox" class="flat" name="table_records">
                  </td>
                  <td class=" ">121000040</td>
                  <td class=" ">May 24, 2014 11:47:56 PM </td>
                  <td class=" ">121000210</td>
                  <td class=" ">John Blank L</td>
                  <td class=" ">Paid</td>
                  <td class="a-right a-right ">$7.45</td>
                  <td class=" last"><a href="#">View</a>
                  </td>
                </tr>
                <tr class="odd pointer">
                  <td class="a-center ">
                    <input type="checkbox" class="flat" name="table_records">
                  </td>
                  <td class=" ">121000039</td>
                  <td class=" ">May 26, 2014 11:30:12 PM</td>
                  <td class=" ">121000208 <i class="error fa fa-long-arrow-down"></i>
                  </td>
                  <td class=" ">John Blank L</td>
                  <td class=" ">Paid</td>
                  <td class="a-right a-right ">$741.20</td>
                  <td class=" last"><a href="#">View</a>
                  </td>
                </tr>
                <tr class="even pointer">
                  <td class="a-center ">
                    <input type="checkbox" class="flat" name="table_records">
                  </td>
                  <td class=" ">121000038</td>
                  <td class=" ">May 26, 2014 10:55:33 PM</td>
                  <td class=" ">121000203</td>
                  <td class=" ">Mike Smith</td>
                  <td class=" ">Paid</td>
                  <td class="a-right a-right ">$432.26</td>
                  <td class=" last"><a href="#">View</a>
                  </td>
                </tr>
                <tr class="odd pointer">
                  <td class="a-center ">
                    <input type="checkbox" class="flat" name="table_records">
                  </td>
                  <td class=" ">121000037</td>
                  <td class=" ">May 26, 2014 10:52:44 PM</td>
                  <td class=" ">121000204</td>
                  <td class=" ">Mike Smith</td>
                  <td class=" ">Paid</td>
                  <td class="a-right a-right ">$333.21</td>
                  <td class=" last"><a href="#">View</a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
@endsection
