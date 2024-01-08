<div class="row">
    <!-- TABLE -->
    <div class="card" id="table_class_meet">
        <div class="card-body">
            <div class="d-flex flex-row">
                <h5 class="card-title">History Log</h5>
            </div>

            <!-- Bordered Table -->
            <table class="table table-bordered datatable">
                <thead>
                    <tr>
                        <th scope="col">Aksi</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Username</th>
                        <th scope="col">Level</th>
                        <th scope="col">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(count($data) > 0){
                            foreach ($data as $key => $value) {
                    ?>
                    <tr>
                        <td><?=$value->action;?></td>
                        <td><?=$value->menu;?></td>
                        <td><?=$value->username;?></td>
                        <td><?=$value->level;?></td>
                        <td><?=$value->created_at;?></td>
                    </tr>
                    <?php
                            }
                        }
                    ?>
                </tbody>
            </table>
            <!-- End Bordered Table -->

        </div>
    </div>

</div>