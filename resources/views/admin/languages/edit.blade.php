@extends('admin.layouts.include')

@section('content')
<span id="result"></span>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <!-- <h1>DataTables</h1> -->
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Edit Language</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6 align-self-center" id="profile_form" style="margin-left: 25%">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Language</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{route('admin.language.update', ['id' => $lan->id])}}">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Language Name</label>
                                            <input type="text" name="name" class="form-control" value="{{$lan->name}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Language Code</label>
                                            <input type="text" name="code" class="form-control" value="{{$lan->code}}"
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l1" class="form-control" value="{{$lan->l1}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l2" class="form-control" value="{{$lan->l2}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l3" class="form-control" value="{{$lan->l3}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l4" class="form-control" value="{{$lan->l4}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l5" class="form-control" value="{{$lan->l5}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l5" class="form-control" value="{{$lan->l5}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l6" class="form-control" value="{{$lan->l6}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l7" class="form-control" value="{{$lan->l7}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l8" class="form-control" value="{{$lan->l8}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l9" class="form-control" value="{{$lan->l9}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l10" class="form-control" value="{{$lan->l10}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l11" class="form-control" value="{{$lan->l11}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l12" class="form-control" value="{{$lan->l12}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l13" class="form-control" value="{{$lan->l13}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l14" class="form-control" value="{{$lan->l14}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l15" class="form-control" value="{{$lan->l15}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l16" class="form-control" value="{{$lan->l16}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l17" class="form-control" value="{{$lan->l17}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l18" class="form-control" value="{{$lan->l18}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l19" class="form-control" value="{{$lan->l19}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l20" class="form-control" value="{{$lan->l20}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l21" class="form-control" value="{{$lan->l21}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l22" class="form-control" value="{{$lan->l22}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l23" class="form-control" value="{{$lan->l23}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l24" class="form-control" value="{{$lan->l24}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l25" class="form-control" value="{{$lan->l25}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l26" class="form-control" value="{{$lan->l26}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l27" class="form-control" value="{{$lan->l27}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l28" class="form-control" value="{{$lan->l28}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l29" class="form-control" value="{{$lan->l29}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l30" class="form-control" value="{{$lan->l30}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l31" class="form-control" value="{{$lan->l31}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l32" class="form-control" value="{{$lan->l32}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l33" class="form-control" value="{{$lan->l33}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l34" class="form-control" value="{{$lan->l34}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l35" class="form-control" value="{{$lan->l35}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l36" class="form-control" value="{{$lan->l36}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l37" class="form-control" value="{{$lan->l37}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l38" class="form-control" value="{{$lan->l38}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l39" class="form-control" value="{{$lan->l39}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l40" class="form-control" value="{{$lan->l40}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l41" class="form-control" value="{{$lan->l41}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l42" class="form-control" value="{{$lan->l42}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l43" class="form-control" value="{{$lan->l43}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l44" class="form-control" value="{{$lan->l44}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l45" class="form-control" value="{{$lan->l45}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l46" class="form-control" value="{{$lan->l46}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l47" class="form-control" value="{{$lan->l47}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l48" class="form-control" value="{{$lan->l48}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l49" class="form-control" value="{{$lan->l49}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l50" class="form-control" value="{{$lan->l50}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l51" class="form-control" value="{{$lan->l51}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l52" class="form-control" value="{{$lan->l52}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l53" class="form-control" value="{{$lan->l53}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l54" class="form-control" value="{{$lan->l54}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l55" class="form-control" value="{{$lan->l55}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l56" class="form-control" value="{{$lan->l56}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l57" class="form-control" value="{{$lan->l57}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l58" class="form-control" value="{{$lan->l58}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l59" class="form-control" value="{{$lan->l59}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l60" class="form-control" value="{{$lan->l60}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l61" class="form-control" value="{{$lan->l61}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l62" class="form-control" value="{{$lan->l62}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l63" class="form-control" value="{{$lan->l63}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l64" class="form-control" value="{{$lan->l64}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l65" class="form-control" value="{{$lan->l65}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l66" class="form-control" value="{{$lan->l66}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l67" class="form-control" value="{{$lan->l67}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l68" class="form-control" value="{{$lan->l68}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l69" class="form-control" value="{{$lan->l69}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l70" class="form-control" value="{{$lan->l70}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l71" class="form-control" value="{{$lan->l71}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l72" class="form-control" value="{{$lan->l72}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l73" class="form-control" value="{{$lan->l73}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l74" class="form-control" value="{{$lan->l74}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l75" class="form-control" value="{{$lan->l75}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l76" class="form-control" value="{{$lan->l76}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l77" class="form-control" value="{{$lan->l77}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l78" class="form-control" value="{{$lan->l78}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l79" class="form-control" value="{{$lan->l79}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l80" class="form-control" value="{{$lan->l80}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l81" class="form-control" value="{{$lan->l81}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l82" class="form-control" value="{{$lan->l82}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l83" class="form-control" value="{{$lan->l83}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l84" class="form-control" value="{{$lan->l84}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l85" class="form-control" value="{{$lan->l85}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l86" class="form-control" value="{{$lan->l86}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l87" class="form-control" value="{{$lan->l87}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l88" class="form-control" value="{{$lan->l88}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l89" class="form-control" value="{{$lan->l89}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l90" class="form-control" value="{{$lan->l90}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l91" class="form-control" value="{{$lan->l91}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l92" class="form-control" value="{{$lan->l92}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l93" class="form-control" value="{{$lan->l93}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l94" class="form-control" value="{{$lan->l94}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l95" class="form-control" value="{{$lan->l95}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l96" class="form-control" value="{{$lan->l96}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l97" class="form-control" value="{{$lan->l97}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l98" class="form-control" value="{{$lan->l98}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l99" class="form-control" value="{{$lan->l99}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l100" class="form-control" value="{{$lan->l100}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l101" class="form-control" value="{{$lan->l101}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l102" class="form-control" value="{{$lan->l102}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l103" class="form-control" value="{{$lan->l103}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l104" class="form-control" value="{{$lan->l104}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l105" class="form-control" value="{{$lan->l105}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l106" class="form-control" value="{{$lan->l106}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l107" class="form-control" value="{{$lan->l107}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l108" class="form-control" value="{{$lan->l108}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l109" class="form-control" value="{{$lan->l109}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l110" class="form-control" value="{{$lan->l110}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l111" class="form-control" value="{{$lan->l111}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l112" class="form-control" value="{{$lan->l112}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l113" class="form-control" value="{{$lan->l113}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l114" class="form-control" value="{{$lan->l114}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l115" class="form-control" value="{{$lan->l115}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l116" class="form-control" value="{{$lan->l116}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l117" class="form-control" value="{{$lan->l117}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l118" class="form-control" value="{{$lan->l118}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l119" class="form-control" value="{{$lan->l119}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l120" class="form-control" value="{{$lan->l120}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l121" class="form-control" value="{{$lan->l121}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l122" class="form-control" value="{{$lan->l122}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l123" class="form-control" value="{{$lan->l123}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l124" class="form-control" value="{{$lan->l124}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l125" class="form-control" value="{{$lan->l125}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l126" class="form-control" value="{{$lan->l126}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l127" class="form-control" value="{{$lan->l127}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l128" class="form-control" value="{{$lan->l128}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l129" class="form-control" value="{{$lan->l129}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l130" class="form-control" value="{{$lan->l130}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l131" class="form-control" value="{{$lan->l131}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l132" class="form-control" value="{{$lan->l132}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l133" class="form-control" value="{{$lan->l133}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l134" class="form-control" value="{{$lan->l134}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l135" class="form-control" value="{{$lan->l135}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l136" class="form-control" value="{{$lan->l136}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l137" class="form-control" value="{{$lan->l137}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l138" class="form-control" value="{{$lan->l138}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l139" class="form-control" value="{{$lan->l139}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l140" class="form-control" value="{{$lan->l140}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l141" class="form-control" value="{{$lan->l141}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l142" class="form-control" value="{{$lan->l142}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l143" class="form-control" value="{{$lan->l143}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l144" class="form-control" value="{{$lan->l144}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l145" class="form-control" value="{{$lan->l145}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l146" class="form-control" value="{{$lan->l146}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l147" class="form-control" value="{{$lan->l147}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l148" class="form-control" value="{{$lan->l148}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l149" class="form-control" value="{{$lan->l149}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l150" class="form-control" value="{{$lan->l150}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l151" class="form-control" value="{{$lan->l151}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l152" class="form-control" value="{{$lan->l152}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l153" class="form-control" value="{{$lan->l153}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l154" class="form-control" value="{{$lan->l154}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l155" class="form-control" value="{{$lan->l155}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l156" class="form-control" value="{{$lan->l156}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l157" class="form-control" value="{{$lan->l157}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l158" class="form-control" value="{{$lan->l158}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l159" class="form-control" value="{{$lan->l159}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l160" class="form-control" value="{{$lan->l160}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l161" class="form-control" value="{{$lan->l161}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l162" class="form-control" value="{{$lan->l162}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l163" class="form-control" value="{{$lan->l163}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l164" class="form-control" value="{{$lan->l164}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l165" class="form-control" value="{{$lan->l165}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l166" class="form-control" value="{{$lan->l166}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l167" class="form-control" value="{{$lan->l167}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l168" class="form-control" value="{{$lan->l168}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l169" class="form-control" value="{{$lan->l169}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l170" class="form-control" value="{{$lan->l170}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l171" class="form-control" value="{{$lan->l171}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l172" class="form-control" value="{{$lan->l172}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l173" class="form-control" value="{{$lan->l173}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l174" class="form-control" value="{{$lan->l174}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l175" class="form-control" value="{{$lan->l175}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l176" class="form-control" value="{{$lan->l176}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l177" class="form-control" value="{{$lan->l177}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l178" class="form-control" value="{{$lan->l178}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l179" class="form-control" value="{{$lan->l179}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l180" class="form-control" value="{{$lan->l180}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l181" class="form-control" value="{{$lan->l181}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l182" class="form-control" value="{{$lan->l182}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l183" class="form-control" value="{{$lan->l183}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l184" class="form-control" value="{{$lan->l184}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l185" class="form-control" value="{{$lan->l185}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l186" class="form-control" value="{{$lan->l186}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l187" class="form-control" value="{{$lan->l187}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l188" class="form-control" value="{{$lan->l188}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l189" class="form-control" value="{{$lan->l189}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l190" class="form-control" value="{{$lan->l190}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l191" class="form-control" value="{{$lan->l191}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l192" class="form-control" value="{{$lan->l192}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l193" class="form-control" value="{{$lan->l193}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l194" class="form-control" value="{{$lan->l194}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l195" class="form-control" value="{{$lan->l195}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l196" class="form-control" value="{{$lan->l196}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l197" class="form-control" value="{{$lan->l197}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l198" class="form-control" value="{{$lan->l198}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l199" class="form-control" value="{{$lan->l199}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l200" class="form-control" value="{{$lan->l200}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l201" class="form-control" value="{{$lan->l201}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l202" class="form-control" value="{{$lan->l202}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l203" class="form-control" value="{{$lan->l203}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l204" class="form-control" value="{{$lan->l204}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l205" class="form-control" value="{{$lan->l205}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l206" class="form-control" value="{{$lan->l206}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l207" class="form-control" value="{{$lan->l207}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l208" class="form-control" value="{{$lan->l208}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l209" class="form-control" value="{{$lan->l209}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l210" class="form-control" value="{{$lan->l210}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l211" class="form-control" value="{{$lan->l211}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l212" class="form-control" value="{{$lan->l212}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l213" class="form-control" value="{{$lan->l213}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l214" class="form-control" value="{{$lan->l214}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l215" class="form-control" value="{{$lan->l215}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l216" class="form-control" value="{{$lan->l216}}"
                                                required>
                                        </div>
                                    </div>
                                    {{-- new --}}
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l217" class="form-control" value="{{$lan->l217}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l218" class="form-control" value="{{$lan->l218}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l219" class="form-control" value="{{$lan->l219}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l220" class="form-control" value="{{$lan->l220}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l221" class="form-control" value="{{$lan->l221}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l222" class="form-control" value="{{$lan->l222}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l223" class="form-control" value="{{$lan->l223}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l224" class="form-control" value="{{$lan->l224}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l225" class="form-control" value="{{$lan->l225}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l226" class="form-control" value="{{$lan->l226}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l227" class="form-control" value="{{$lan->l227}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l228" class="form-control" value="{{$lan->l228}}"
                                                required>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l229" class="form-control" value="{{$lan->l229}}"
                                                required>
                                        </div>
                                    </div>
                                    {{-- new --}}
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l230" class="form-control" value="{{$lan->l230}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l231" class="form-control" value="{{$lan->l231}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l232" class="form-control" value="{{$lan->l232}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l233" class="form-control" value="{{$lan->l233}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l234" class="form-control" value="{{$lan->l234}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l235" class="form-control" value="{{$lan->l235}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l236" class="form-control" value="{{$lan->l236}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l237" class="form-control" value="{{$lan->l237}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l238" class="form-control" value="{{$lan->l238}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l239" class="form-control" value="{{$lan->l239}}"
                                                required>
                                        </div>
                                    </div>
                                      {{-- new fields  --}}
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l240" class="form-control" value="{{$lan->l240}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l241" class="form-control" value="{{$lan->l241}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l242" class="form-control" value="{{$lan->l242}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l243" class="form-control" value="{{$lan->l243}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l244" class="form-control" value="{{$lan->l244}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l245" class="form-control" value="{{$lan->l245}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l246" class="form-control" value="{{$lan->l246}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l247" class="form-control" value="{{$lan->l247}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l248" class="form-control" value="{{$lan->l248}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l249" class="form-control" value="{{$lan->l249}}"
                                                required>
                                        </div>
                                    </div>

                                    {{-- 10 --}}
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l250" class="form-control" value="{{$lan->l250}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l251" class="form-control" value="{{$lan->l251}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l252" class="form-control" value="{{$lan->l252}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l253" class="form-control" value="{{$lan->l253}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l254" class="form-control" value="{{$lan->l254}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l255" class="form-control" value="{{$lan->l255}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l256" class="form-control" value="{{$lan->l256}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l257" class="form-control" value="{{$lan->l257}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l258" class="form-control" value="{{$lan->l258}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l259" class="form-control" value="{{$lan->l259}}"
                                                required>
                                        </div>
                                    </div>
                                    {{-- 20 --}}
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l260" class="form-control" value="{{$lan->l260}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l261" class="form-control" value="{{$lan->l261}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l262" class="form-control" value="{{$lan->l262}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l263" class="form-control" value="{{$lan->l263}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l264" class="form-control" value="{{$lan->l264}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l265" class="form-control" value="{{$lan->l265}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l266" class="form-control" value="{{$lan->l266}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l267" class="form-control" value="{{$lan->l267}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l268" class="form-control" value="{{$lan->l268}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l269" class="form-control" value="{{$lan->l269}}"
                                                required>
                                        </div>
                                    </div>
                                    {{-- 30 --}}
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l270" class="form-control" value="{{$lan->l270}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l271" class="form-control" value="{{$lan->l271}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l272" class="form-control" value="{{$lan->l272}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l273" class="form-control" value="{{$lan->l273}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l274" class="form-control" value="{{$lan->l274}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l275" class="form-control" value="{{$lan->l275}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l276" class="form-control" value="{{$lan->l276}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l277" class="form-control" value="{{$lan->l277}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l278" class="form-control" value="{{$lan->l278}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l2679" class="form-control" value="{{$lan->l279}}"
                                                required>
                                        </div>
                                    </div>
                                    {{-- 40 --}}
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l280" class="form-control" value="{{$lan->l280}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l281" class="form-control" value="{{$lan->l281}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l282" class="form-control" value="{{$lan->l282}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l283" class="form-control" value="{{$lan->l283}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l284" class="form-control" value="{{$lan->l284}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l285" class="form-control" value="{{$lan->l285}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l286" class="form-control" value="{{$lan->l286}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l287" class="form-control" value="{{$lan->l287}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l288" class="form-control" value="{{$lan->l288}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l289" class="form-control" value="{{$lan->l289}}"
                                                required>
                                        </div>
                                    </div>
                                    {{-- 50 --}}
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l290" class="form-control" value="{{$lan->l290}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l291" class="form-control" value="{{$lan->l291}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l292" class="form-control" value="{{$lan->l292}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l293" class="form-control" value="{{$lan->l293}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l294" class="form-control" value="{{$lan->l294}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l295" class="form-control" value="{{$lan->l295}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l296" class="form-control" value="{{$lan->l296}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l297" class="form-control" value="{{$lan->l297}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l298" class="form-control" value="{{$lan->l298}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l299" class="form-control" value="{{$lan->l299}}"
                                                required>
                                        </div>
                                    </div>
                                    {{-- 60 --}}
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l300" class="form-control" value="{{$lan->l300}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l301" class="form-control" value="{{$lan->l301}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l302" class="form-control" value="{{$lan->l302}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l303" class="form-control" value="{{$lan->l303}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l304" class="form-control" value="{{$lan->l304}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="l305" class="form-control" value="{{$lan->l305}}"
                                                required>
                                        </div>
                                    </div>
                                    
                                    {{-- 65 --}}
                                </div>
                            </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" id="add" class="btn btn-primary">Update</button>
                    </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
</div><!-- /.container-fluid -->
</section>
</div>
@endsection
