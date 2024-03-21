<?php
/**
 * The preloader
 */
?>
<style>
    .preloader {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #d3d3d3;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    .preloader .logo__img {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        animation: show 0.5s linear both;
    }

    .spinner {
        width: 140px;
        height: 140px;
        border: 5px solid #fdc496;
        border-top-color: #43B4BC;
        border-bottom-color: #43B4BC;
        border-radius: 50%;
        animation: show 0.5s linear both, spin 1s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }

    @keyframes show {
        0% {
            opacity: 0;
        }

        50% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
    }
</style>
<div class="preloader">
    <img class="logo__img" src="<?php echo get_template_directory_uri() . '/assets/images/icons/preloader.svg' ?>"
         alt="armchair">
    <div class="spinner">
    </div>
</div>
<script>
    document.querySelector('.preloader').style.display = 'flex';
</script>