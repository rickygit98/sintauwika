    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="showTopik" tabindex="-1" aria-labelledby="showTopikLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="showTopikLabel">Detail Topik</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form>
                        @csrf
                        <input type="hidden" name='id_topik' wire:model='id_topik'>
                        {{-- Title --}}
                        <div class="input-group mb-3">
                            <input id="title" type="text" class="form-control" name="title" wire:model='title'
                                readonly>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="fas fa-file"></i>
                                </div>
                            </div>
                        </div>


                        <div class="input-group mb-3">

                            <input id="mahasiswa" type="text" class="form-control" name="mahasiswa"
                                wire:model='mahasiswa' readonly>

                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="fas fa-user-graduate"></i>
                                </div>
                            </div>
                        </div>


                        <div class="input-group mb-3">

                            <input id="pembimbing" type="text" class="form-control" name="pembimbing"
                                wire:model='pembimbing' readonly>

                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="fas fa-chalkboard-teacher"></i>
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-3">

                            <input id="comment" type="text" class="form-control" name="comment" readonly
                                wire:model='comment'>

                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="fas fa-comment"></i>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
