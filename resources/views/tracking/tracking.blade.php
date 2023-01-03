<x-volt-app title="Lacak">
    <x-volt-breadcrumb>
        <x-volt-item><a href="{{ route('home') }}">Monitoring</a></x-volt-item>
        <x-volt-item>Lacak</x-volt-item>
    </x-volt-breadcrumb>
    <ul class="timeline timeline-horizontal">
        <li id="entry" style="display:none" class="timeline-item">
            <img class="timeline-badge"src="{{url('/images/pick-up.gif')}}">
            <div class="timeline-panel">
                <div class="timeline-heading">
                    <h4 class="timeline-title">Entri Resi</h4>
                    <p><small class="text-muted"></small></p>
                </div>
                <div class="timeline-body">
                    <p>Barang baru dientri oleh user, dan proses perjalanan baru akan dimulai </p>
                </div>
            </div>
        </li>
        <li id="outgoing" style="display:none" class="timeline-item">
            <img class="timeline-badge"src="{{url('/images/on-progress.gif')}}">
            <div class="timeline-panel">
                <div class="timeline-heading">
                    <h4 class="timeline-title">Outgoing</h4>
                    <p><small class="text-muted"></small></p>
                </div>
                <div class="timeline-body">
                    <p>Barang sedang diantar ke cabang lain untuk melakukan transit</p>
                </div>
            </div>
        </li>
        <li id="incoming" style="display:none" class="timeline-item">
            <img class="timeline-badge"src="{{url('/images/on-progress.gif')}}">
            <div class="timeline-panel">
                <div class="timeline-heading">
                    <h4 class="timeline-title">Incoming</h4>
                    <p><small class="text-muted"></small></p>
                </div>
                <div class="timeline-body">
                    <p>Barang sedang memasuki cabang untuk menyelesaikan transit</p>
                </div>
            </div>
        </li>
        <li id="delivery" style="display:none" class="timeline-item">
            <img class="timeline-badge"src="{{url('/images/on-delivery.gif')}}">
            <div class="timeline-panel">
                <div class="timeline-heading">
                    <h4 class="timeline-title">On Delivery</h4>
                    <p><small class="text-muted"></small></p>
                </div>
                <div class="timeline-body">
                    <p>Barang sedang diantar kepada penerima oleh kurir</p>
                </div>
            </div>
        </li>
        <li id="delivered" style="display:none" class="timeline-item">
            <img class="timeline-badge"src="{{url('/images/delivered.gif')}}">
            <div class="timeline-panel">
                <div class="timeline-heading">
                    <h4 class="timeline-title">Delivered</h4>
                    <p><small class="text-muted"></small></p>
                </div>
                <div class="timeline-body">
                    <p>Barang sudah diterima oleh penerima</p>
                </div>
            </div>
        </li>
    </ul>
    @livewire(\App\Http\Livewire\Table\Tracking::class)
</x-volt-app>
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '<?= csrf_token() ?>'
            }
        });

        $('tbody').hide(); //Default state

        $("input:text").keyup(function(){
            $('tbody').show();
            let cn_no = $(this).val()

            $.ajax({
                url: "{{ route('tracking.getlaststatus') }}",
                type: 'post',
                data: {
                    cn_no: cn_no
                }, dataType: 'json',
                success: function(data) {
                    if(data != undefined){
                        if (data.cn_processcode == 'DL'){
                            $('#entry').show()
                            $('#outgoing').show()
                            $('#incoming').show()
                            $('#delivery').show()
                            $('#delivered').show()
                        }else if(data.cn_processcode == 'DV'){
                            $('#entry').show()
                            $('#outgoing').show()
                            $('#incoming').show()
                            $('#delivery').show()
                        }else if(data.cn_processcode == 'IN'){
                            $('#entry').show()
                            $('#outgoing').show()
                            $('#incoming').show()
                        } else if(data.cn_processcode == 'OG'){
                            $('#entry').show()
                            $('#outgoing').show()
                        }else if(data.cn_processcode == 'EN'){
                            $('#entry').show()
                        }else{
                            $('#entry').hide()
                            $('#outgoing').hide()
                            $('#incoming').hide()
                            $('#delivery').hide()
                            $('#delivered').hide()
                        }
                    }else{
                        $('#entry').hide()
                        $('#outgoing').hide()
                        $('#incoming').hide()
                        $('#delivery').hide()
                        $('#delivered').hide()
                    }
                }
            });
        });
    });
</script>
<style>
.bill_state_listimg {
    display: inline-block;
    vertical-align: middle;
    font-size: 0;
    letter-spacing: -4px;
}

.bill_state_img {
    display: inline-block;
    vertical-align: middle;
    position: relative;
}

.bill_state_img.on span {
    color: red;
}
/* Timeline */
.timeline,
.timeline-horizontal {
    list-style: none;
    padding: 20px;
    position: relative;
}
.timeline:before {
    top: 40px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 3px;
    background-color: #eeeeee;
    left: 50%;
    margin-left: -1.5px;
}
.timeline .timeline-item {
    margin-bottom: 20px;
    position: relative;
}
.timeline .timeline-item:before,
.timeline .timeline-item:after {
    content: "";
    display: table;
}
.timeline .timeline-item:after {
    clear: both;
}
.timeline .timeline-item .timeline-badge {
    color: #fff;
    width: 90px;
    height: 90px;
    line-height: 52px;
    font-size: 22px;
    text-align: center;
    position: absolute;
    top: 18px;
    bottom: 18px;
    left: 50%;
    margin-left: -25px;
    z-index: 100;
}
.timeline .timeline-item .timeline-badge i,
.timeline .timeline-item .timeline-badge .fa,
.timeline .timeline-item .timeline-badge .glyphicon {
    top: 2px;
    left: 0px;
}
.timeline .timeline-item .timeline-badge.primary {
    background-color: #1f9eba;
}
.timeline .timeline-item .timeline-badge.info {
    background-color: #5bc0de;
}
.timeline .timeline-item .timeline-badge.success {
    background-color: #59ba1f;
}
.timeline .timeline-item .timeline-badge.warning {
    background-color: #d1bd10;
}
.timeline .timeline-item .timeline-badge.danger {
    background-color: #ba1f1f;
}
.timeline .timeline-item .timeline-panel {
    position: relative;
    width: 46%;
    float: left;
    right: 16px;
    border: 1px solid #c0c0c0;
    background: #ffffff;
    border-radius: 2px;
    padding: 20px;
    -webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
    box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
}
.timeline .timeline-item .timeline-panel:before {
    position: absolute;
    top: 26px;
    right: -16px;
    display: inline-block;
    border-top: 16px solid transparent;
    border-left: 16px solid #c0c0c0;
    border-right: 0 solid #c0c0c0;
    border-bottom: 16px solid transparent;
    content: " ";
}
.timeline .timeline-item .timeline-panel .timeline-title {
    margin-top: 0;
    color: inherit;
}
.timeline .timeline-item .timeline-panel .timeline-body > p,
.timeline .timeline-item .timeline-panel .timeline-body > ul {
    margin-bottom: 0;
}
.timeline .timeline-item .timeline-panel .timeline-body > p + p {
    margin-top: 5px;
}
.timeline .timeline-item:last-child:nth-child(even) {
    float: right;
}
.timeline .timeline-item:nth-child(even) .timeline-panel {
    float: right;
    left: 16px;
}
.timeline .timeline-item:nth-child(even) .timeline-panel:before {
    border-left-width: 0;
    border-right-width: 14px;
    left: -14px;
    right: auto;
}
.timeline-horizontal {
    list-style: none;
    position: relative;
    padding: 20px 0px 20px 0px;
    display: inline-block;
}
.timeline-horizontal:before {
    height: 3px;
    top: auto;
    bottom: 26px;
    left: 56px;
    right: 0;
    width: 100%;
    margin-bottom: 20px;
}
.timeline-horizontal .timeline-item {
    display: table-cell;
    height: 170px;
    width: 20%;
    min-width: 320px;
    float: none !important;
    padding-left: 0px;
    padding-right: 20px;
    margin: 0 auto;
    vertical-align: bottom;
}
.timeline-horizontal .timeline-item .timeline-panel {
    top: auto;
    bottom: 64px;
    display: inline-block;
    float: none !important;
    left: 0 !important;
    right: 0 !important;
    width: 100%;
    margin-bottom: 20px;
}
.timeline-horizontal .timeline-item .timeline-panel:before {
    top: auto;
    bottom: -16px;
    left: 28px !important;
    right: auto;
    border-right: 16px solid transparent !important;
    border-top: 16px solid #c0c0c0 !important;
    border-bottom: 0 solid #c0c0c0 !important;
    border-left: 16px solid transparent !important;
}
.timeline-horizontal .timeline-item:before,
.timeline-horizontal .timeline-item:after {
    display: none;
}
.timeline-horizontal .timeline-item .timeline-badge {
    top: 110px;
    bottom: 0px;
    left: 40px;
}
</style>
