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
                <a href="{{ route('categoria.index')}}">
                    <div class="overview-box sales"><img id="j_idt97" src="{{asset('./assets/images/categoria.png')}}" alt="" class="image-icon" />
                </a>
                <div class="overview-title">CATEGORIA</div>
                <div class="overview-numbers">
                    {{$categoria ?? '0'}}
                </div>
                <div class="overview-subinfo p-grid">
                    <div class="overview-subinfo user">
                        <a href="{{ route('categoria.index')}}">
                            <i class="pi pi-circle-on"></i>
                            <span>Categoria</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-col-12 p-md-6 p-lg-3">
            <a href="{{ route('subcategoria.index')}}">
                <div class="overview-box views"><img id="j_idt99" src="{{asset('./assets/images/subcategoria.png')}}" class="image-icon" />
            </a>
            <div class="overview-title">SUBCATEGORIAS</div>
            <div class="overview-numbers">
                {{$subcategoria ?? '0'}}
            </div>
            <div class="overview-subinfo p-grid">
                <div class="overview-subinfo user">
                    <a href="{{ route('subcategoria.index')}}">
                        <i class="pi pi-circle-on"></i>
                        <span>Subcategoria</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="p-col-12 p-md-6 p-lg-3">
        <a href="{{ url('artigos')}}">
            <div class="overview-box views"><img id="j_idt99" src="{{asset('./assets/images/artigo.png')}}" class="image-icon" />
        </a>
        <div class="overview-title">ARTIGOS</div>
        <div class="overview-numbers">
            {{$artigo ?? '0'}}
        </div>
        <div class="overview-subinfo user">
            <a href="{{ url('artigos')}}">
                <i class="pi pi-circle-on"></i>
                <span>Artigo</span></a>
        </div>
    </div>
</div>
<div class="p-col-12 p-md-6 p-lg-3">
<a href="{{ url('estoques')}}">
    <div class="overview-box views"><img id="j_idt99" src="{{asset('./assets/images/estoque.png')}}" class="image-icon" />
</a>  
    <div class="overview-title">ESTOQUE</div>
        <div class="overview-numbers">
            {{$estoque ?? '0'}}
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