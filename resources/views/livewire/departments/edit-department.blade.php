<div wire:ignore  class="modal fade" id="updateDepartmentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ __('Add a Department') }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="">
                <div class="fv-row mb-7">
                    <label class="required fs-6 fw-semibold mb-2">Name</label>
                    <input wire:model.lazy="name" type="text" class="form-control form-control-solid" placeholder="Enter department name"
                        name="name" />
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button wire:click.prevent="save" type="submit" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  </div>