@if (isset($firstmenu))
    <div class="modal fade text-left" id="firstmenu_deletetModal{{ $firstmenu->id_firstmenu }}" tabindex="-1" role="dialog" aria-labelledby="firstmenu_deletetModalLabel{{ $firstmenu->id_firstmenu }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="firstmenu_deletetModalLabel{{ $firstmenu->id_firstmenu }}">Delete First Menu</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>Are you sure you want to delete this data?</h5>
                    <p>If yes, choose 'Delete' to remove the data.</p>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('menu_firstmenu_destroy', $firstmenu->id_firstmenu) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif

@if (isset($secondmenu))
    <div class="modal fade text-left" id="secondmenu_deletetModal{{ $secondmenu->id_secondmenu }}" tabindex="-1" role="dialog" aria-labelledby="secondmenu_deletetModalLabel{{ $secondmenu->id_secondmenu }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="secondmenu_deletetModalLabel{{ $secondmenu->id_secondmenu }}">Delete Second Menu</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>Are you sure you want to delete this data?</h5>
                    <p>If yes, choose 'Delete' to remove the data.</p>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('menu_secondmenu_destroy', $secondmenu->id_secondmenu) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif

@if (isset($thirdmenu))
    <div class="modal fade text-left" id="thirdmenu_deletetModal{{ $thirdmenu->id_thirdmenu }}" tabindex="-1" role="dialog" aria-labelledby="thirdmenu_deletetModalLabel{{ $thirdmenu->id_thirdmenu }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="thirdmenu_deletetModalLabel{{ $thirdmenu->id_thirdmenu }}">Delete Third Menu</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>Are you sure you want to delete this data?</h5>
                    <p>If yes, choose 'Delete' to remove the data.</p>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('menu_thirdmenu_destroy', $thirdmenu->id_thirdmenu) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif

@if (isset($fourthmenu))
    <div class="modal fade text-left" id="fourthmenu_deletetModal{{ $fourthmenu->id_fourthmenu }}" tabindex="-1" role="dialog" aria-labelledby="fourthmenu_deletetModalLabel{{ $fourthmenu->id_fourthmenu }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="fourthmenu_deletetModalLabel{{ $fourthmenu->id_fourthmenu }}">Delete Fourth Menu</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>Are you sure you want to delete this data?</h5>
                    <p>If yes, choose 'Delete' to remove the data.</p>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('menu_fourthmenu_destroy', $fourthmenu->id_fourthmenu) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif
