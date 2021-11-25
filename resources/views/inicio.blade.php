@extends('templates.templates')

@section('content')
<div class="route-bar p-col-40 p-md-12 p-lg-12">
    <div class="route-bar-breadcrumb">
        <ul>
            <li>
                <a href="dashboard.html">
                    <i class="pi pi-home"></i>
                </a>
            </li>
            <li>/</li>
            <li><strong><a href="dashboard.html" class="ui-link ui-widget">Painel Principal</a></strong></li>
            <div class="overview-subinfo p-grid">
            <span class="p-col-12">Dados Estatístico das Últimas 24 Horas</span>
            </div>
        </ul>
    </div>
</div>
<div class="layout-content">
    <div class="layout-dashboard">
        <div class="p-grid">
            <div class="p-col-12 p-md-6 p-lg-3">
                <div class="overview-box sales"><img id="j_idt97" src="{{asset('./assets/images/users/Milton.jpg')}}" alt="" class="image-icon" />
                    <div class="overview-title">CATEGORIA</div>
                    <div class="overview-numbers">
                        100
                    </div>
                    <div class="overview-subinfo p-grid">
                    <div class="overview-subinfo user">
                        <i class="pi pi-circle-on"></i>
                        <span>Categoria</span>
                    </div>
                    </div>
                </div>
            </div>
            <div class="p-col-12 p-md-6 p-lg-3">
                <div class="overview-box views"><img id="j_idt99" src="{{asset('./assets/images/users/Milton.jpg')}}" class="image-icon" />
                    <div class="overview-title">SUBCATEGORIAS</div>
                    <div class="overview-numbers">
                        100
                    </div>
                    <div class="overview-subinfo p-grid">
                        <div class="overview-subinfo user">
                        <i class="pi pi-circle-on"></i>
                        <span>Subcategoria</span>
                    </div>
                    </div>
                </div>
            </div>
            <div class="p-col-12 p-md-6 p-lg-3">
            <div class="overview-box views"><img id="j_idt99" src="{{asset('./assets/images/users/Milton.jpg')}}" class="image-icon" />
                    <div class="overview-title">ARTIGOS</div>
                    <div class="overview-numbers">
                        100
                    </div>
                    <div class="overview-subinfo user">
                        <i class="pi pi-circle-on"></i>
                        <span>Atigo</span>
                    </div>
                </div>
            </div>
            <div class="p-col-12 p-md-6 p-lg-3">
            <div class="overview-box views"><img id="j_idt99" src="{{asset('./assets/images/users/Milton.jpg')}}" class="image-icon" />
                    <div class="overview-title">ESTOQUE</div>
                    <div class="overview-numbers">
                        100
                    </div>
                    <div class="overview-subinfo checkin">
                        <i class="pi pi-circle-on"></i>
                        <span>Estoque</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection