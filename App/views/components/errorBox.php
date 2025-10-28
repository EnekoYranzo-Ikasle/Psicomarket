<div id="error-box" class="error" style="display:none;"></div>

<?php if (isset($error) && $error !== ''): ?>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      showError("<?php echo addslashes($error); ?>");
    });
  </script>
<?php endif; ?>

<script src="assets/scripts/errorBox.js"></script>
