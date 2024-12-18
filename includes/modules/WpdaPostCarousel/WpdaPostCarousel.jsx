// External Dependencies
import React, { Component } from 'react';

// Internal Dependencies
import './style.css';
import $ from 'jquery';


class WpdaPostCarousel extends Component {

  static slug = 'wpda_post_carousel';

	componentDidMount() {
		// Initialize Owl Carousel once the component mounts
		$('.blog-carousel').owlCarousel({
			loop: true,
			margin: 50,
			autoplay: true,
			autoplayTimeout: 3000,
			nav: true,
			dots: false,
			responsive: {
				0: {
					items: 1,
					nav: true,
					dots: false
				},
				768: {
					items: 2
				},
				1024: {
					items: 3
				}
			}
		});
	}

  render() {
    const PostType = this.props.posttype;
    const PostPerPage = this.props.postperpage;
    const PostCategory = this.props.postcategory;
    return (
			<>
				<div className="blog-carousel owl-carousel owl-theme">
					<div className="item">
						<div className="carousel_content">
							<div className="wpda_post_thumbnail">
								{PostType}
							</div>
							<div className="wpda_post_title">
								{PostPerPage}
							</div>
							<div className="wpda_post_date">
								{PostCategory}
								
							</div>
						</div>
					</div>
				</div>
			</>
    );
  }
}

export default WpdaPostCarousel;