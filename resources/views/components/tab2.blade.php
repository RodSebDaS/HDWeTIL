<div class="col-12 col-sm-12">
    <div class="card card-primary card-outline card-outline-tabs">
        <div class="card-header p-0 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-{{ $tab1Name }}-tab" data-toggle="pill" href="#custom-tabs-{{ $tab1Name }}"
                        role="tab" aria-controls="custom-tabs-{{ $tab1Name }}" aria-selected="true">{{ $tab1Name }}</a>
                </li>
                @isset($tab2Name)
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-{{ $tab2Name }}-tab" data-toggle="pill" href="#custom-tabs-{{ $tab2Name }}"
                            role="tab" aria-controls="custom-tabs-{{ $tab2Name }}" aria-selected="false">{{ $tab2Name }}</a>
                    </li>
                @endisset
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-{{ $tab3Name }}-tab" data-toggle="pill"
                        href="#custom-tabs-{{ $tab3Name }}" role="tab" aria-controls="custom-tabs-{{ $tab3Name }}"
                        aria-selected="false">{{ $tab3Name }}</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-{{ $tab1Name }}">
                <div class="tab-pane fade show active" id="custom-tabs-{{ $tab1Name }}" role="tabpanel"
                    aria-labelledby="custom-tabs-{{ $tab1Name }}-tab">
                    <slot name="{{ $tab1Name }}">
                        {{ $tab1Name }}
                    </slot>
                </div>
                <div class="tab-pane fade" id="custom-tabs-{{ $tab2Name }}" role="tabpanel"
                    aria-labelledby="custom-tabs-{{ $tab2Name }}-tab">
                    @isset($tab2Name)
                        <slot name="{{ $tab2Name }}">
                            {{ $tab2Name }}
                        </slot>
                    @endisset
                </div>
                <div class="tab-pane fade" id="custom-tabs-{{ $tab3Name }}" role="tabpanel"
                    aria-labelledby="custom-tabs-{{ $tab3Name }}-tab">
                    @isset($tab3Name)
                        <slot name="{{ $tab3Name }}">
                            {{ $tab3Name }}
                        </slot>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</div>
