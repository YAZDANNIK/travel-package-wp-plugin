<?php


get_header();
?>

<div class="travel-package-container">
    <?php while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('travel-package'); ?>>
            <header class="package-header">
                <div class="package-header-content">
                    <h1 class="package-title"><?php the_title(); ?></h1>
                    <div class="package-meta-banner">
                        <?php
                        $price = get_post_meta(get_the_ID(), '_package_price', true);
                        $availability = get_post_meta(get_the_ID(), '_package_availability', true);
                        ?>
                        
                        <?php if ($price) : ?>
                            <div class="package-price">
                                <span class="meta-label">Price</span>
                                <span class="price-amount">$<?php echo esc_html(number_format($price, 2)); ?></span>
                            </div>
                        <?php endif; ?>

                        <?php if ($availability) : ?>
                            <div class="package-availability">
                                <span class="meta-label">Status</span>
                                <span class="status-badge status-<?php echo esc_attr($availability); ?>">
                                    <?php echo esc_html(ucfirst($availability)); ?>
                                </span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                
                <?php if (has_post_thumbnail()) : ?>
                    <div class="package-image">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>
            </header>

            <div class="package-content">
                <?php the_content(); ?>
            </div>

            <?php if ($availability !== 'booked') : ?>
                <div class="package-cta">
                    <a href="#" class="book-now-button">Book This Package</a>
                </div>
            <?php endif; ?>
        </article>
    <?php endwhile; ?>
</div>

<style>

.travel-package-container {
    max-width: 1200px;
    margin: 2rem auto;
    padding: 0 20px;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen-Sans, Ubuntu, Cantarell, sans-serif;
}


.package-header {
    margin-bottom: 3rem;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
    overflow: hidden;
}

.package-header-content {
    padding: 2rem;
}

.package-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #2c3e50;
    margin: 0 0 1.5rem;
    line-height: 1.2;
}


.package-meta-banner {
    display: flex;
    flex-wrap: wrap;
    gap: 2rem;
    align-items: center;
    margin-top: 1.5rem;
}

.package-price, .package-availability {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.meta-label {
    font-size: 0.875rem;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    color: #64748b;
	}

	.price-amount {
		font-size: 1.5rem;
		font-weight: 700;
		color: #2c3e50;
	}


	.status-badge {
		display: inline-block;
		padding: 0.5rem 1rem;
		border-radius: 50px;
		font-weight: 600;
		font-size: 0.875rem;
	}

	.status-available {
		background-color: #dcfce7;
		color: #166534;
	}

	.status-limited {
		background-color: #fef3c7;
		color: #92400e;
	}

	.status-booked {
		background-color: #fee2e2;
		color: #991b1b;
	}


	.package-image {
		width: 100%;
		height: 400px;
		overflow: hidden;
	}

	.package-image img {
		width: 100%;
		height: 100%;
		object-fit: cover;
		transition: transform 0.3s ease;
	}

	.package-image img:hover {
		transform: scale(1.03);
	}


	.package-content {
		padding: 2rem;
		background: #fff;
		border-radius: 12px;
		box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
		margin-bottom: 2rem;
		line-height: 1.7;
		color: #4a5568;
	}


	.package-cta {
		text-align: center;
		margin: 2rem 0;
	}

	.book-now-button {
		display: inline-block;
		padding: 1rem 2.5rem;
		background-color: #2563eb;
		color: white;
		text-decoration: none;
		border-radius: 8px;
		font-weight: 600;
		transition: all 0.2s ease;
		text-transform: uppercase;
		letter-spacing: 0.05em;
	}

	.book-now-button:hover {
		background-color: #1d4ed8;
		transform: translateY(-2px);
		box-shadow: 0 4px 12px rgba(37, 99, 235, 0.2);
	}

	
	@media (max-width: 768px) {
		.package-title {
			font-size: 2rem;
		}

		.package-meta-banner {
			flex-direction: column;
			align-items: flex-start;
			gap: 1rem;
		}

		.package-image {
			height: 300px;
		}

		.book-now-button {
			width: 100%;
		}
	}
</style>

<?php
get_footer();
?>