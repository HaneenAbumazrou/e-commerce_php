<div class="modal fade" id="deleteCoupon<?= $coupon["id"] ?>" tabindex="-1" aria-labelledby="deleteCouponLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="deleteCouponLabel">Delete Coupon</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are You sure to delete <b><?= $coupon["code"] ?></b> ?
      </div>
      <div class="modal-footer">
        <form action="/admin/coupons/delete?coupon_id=<?= $coupon["id"] ?>" method="post">
          <input type="submit" value="Delete" class="btn btn-danger">
        </form>
      </div>
    </div>
  </div>
</div>