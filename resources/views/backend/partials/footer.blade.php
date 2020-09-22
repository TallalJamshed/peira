<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>Copyright &copy; 2020 Private Education Institutes Registration Authority</span>
      </div>
    </div>
  </footer>
  <!-- End of Footer -->

  <!-- Delete Modal-->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white" id="exampleModalLabel">Ready to Delete?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body bg-danger text-white">Are you sure you want to delete this school.</div>
            <div class="modal-footer bg-danger">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <form method="post" action="{{route('deleteschool')}}">
                  @csrf
                  <input type="text" id="reg_id" name="reg_id" hidden>
                  
                  <input class="btn btn-success" type="submit" value="submit" name="submit">
                </form>
            </div>
        </div>
    </div>
</div>