  <!-- Modal -->
  <div style="z-index: 9999" class="modal" id="viewDataModal" tabindex="-1" aria-labelledby="viewDataModalLabel" aria-hidden="true" data-bs-keyboard="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body" id="view_data">
            <div id="modalLoading" style="text-align: center">
                <h5 class="mt-3">Product data is loding ...</h5>
                <img src="{{asset('frontend/images/quic-view-loading.gif')}}" alt="" style="width: 50%;">
            </div>
            <div class="card">
                <div id="modalBody" class="card-body">

                </div>
            </div>

        </div>
      </div>
    </div>
  </div>
    {{-- End Moda; --}}
