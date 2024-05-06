<div class="container">
    <div class="row">
        <div class="col">
            <table class="table">
                <tbody>
                    <?php foreach ($artists as $artist): ?>
                    <tr>
                    <td><?= $artist['name'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>