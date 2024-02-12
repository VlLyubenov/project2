<div class="container">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <table class="table table-sm table-stripped">
                <thead>
                    <tr>
                        <th>Created by</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th></th>

                    </tr>
                </thead>

                <?php foreach (getArticles() as $article) : ?>

                    <tr>
                        <td><?php echo $article['name']; ?></td>
                        <td><a href="article_detail.php?id=<?php echo $article['id']; ?>"><?php echo $article['title']; ?></a></td>
                        <td><?php echo $article['created_at']; ?></td>

                        <td class="text-right">

                            <?php if ($_SESSION['level'] == 1) : ?>
                                <a href="article_edit.php?id=<?php echo $article['id']; ?>&action=edit" class="btn btn-warning btn-sm">Edit</a>
                                <a href="article_act.php?id=<?php echo $article['id']; ?>&action=delete" class=" btn btn-danger btn-sm">Delete</a>
                            <?php else : ?>
                                <?php if ($article['user_id'] == $_SESSION['id']) : ?>
                                    <a href="article_edit.php?id=<?php echo $article['id']; ?>&action=edit" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="article_act.php?id=<?php echo $article['id']; ?>&action=delete" class=" btn btn-danger btn-sm">Delete</a>
                                <?php endif; ?>
                            <?php endif; ?>

                        </td>

                    </tr>

                <?php endforeach; ?>

            </table>
        </div>
    </div>
</div>