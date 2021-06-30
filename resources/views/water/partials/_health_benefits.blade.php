<div class="row">
    <div class="col-md-6 mb-3 mb-md-0 pr-md-0">
        <a class="btn btn-block btn-lg btn-primary {{$slug == 'hydrogen'? 'btn-blue disabled' : 'btn-grey'}}" href="{{url("/health-benefits/hydrogen")}}"
        v-on:click="callToAction('Hydrogen')" >Hydrogen</a>
    </div>
    <div class="col-md-6 mb-3 mb-md-0">
        <a class="btn btn-block btn-lg btn-primary {{$slug == 'balance_ph'? 'btn-blue disabled' : 'btn-grey'}} " href="{{url("/health-benefits/balance-ph")}}"  v-on:click="callToAction('balance-ph')" >Balance PH</a>
    </div>
</div>
<div class="row mt-md-3 mt-0">
    <div class="col-md-6 mb-3 mb-md-0 pr-md-0">
        <a class="btn btn-block btn-lg btn-primary {{$slug == 'minerals'? 'btn-blue disabled' : 'btn-grey'}}" href="{{url("/health-benefits/minerals")}}" v-on:click="callToAction('minerals')"> Minerals</a>
    </div>
    <div class="col-md-6 mb-3 mb-md-0">
        <a class="btn btn-block btn-lg btn-primary {{$slug == 'micro_clustering'? 'btn-blue disabled' : 'btn-grey'}}" href="{{url("/health-benefits/micro-clustering")}}" v-on:click="callToAction('micro-clustering')">Micro-Clustering</a>
    </div>
</div>
