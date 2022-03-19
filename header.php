<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class( 'bg-white text-gray-900 antialiased' ); ?>>

<?php do_action( 'tailpress_site_before' ); ?>

<div id="page" class="min-h-screen flex flex-col">

	<?php do_action( 'tailpress_header' ); ?>
	
	<header>

		<div class="mx-auto container">
			<div class="lg:flex lg:justify-between lg:items-center  py-[20px]">
				<div class="flex justify-between items-center">
					<div>
						<svg width="85" height="112" viewBox="0 0 85 112" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M22.532 106.644H47.5763C50.1389 106.644 52.2291 104.668 52.3245 102.206C52.3275 102.148 52.3344 102.09 52.3344 102.031V91.3412H50.3564C50.3564 95.8623 50.3564 99.7937 50.3564 102.205C50.2634 103.612 49.05 104.736 47.5763 104.736H22.532C21.0121 104.736 19.7677 103.541 19.7446 102.072C19.7441 97.3197 19.7431 86.9418 19.7426 77.0205H17.7739V102.031C17.7739 102.045 17.7764 102.059 17.7764 102.073C17.7995 104.597 19.9232 106.644 22.532 106.644Z" fill="#4DBABD"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M50.0495 54.261C49.581 50.4003 48.698 47.6357 48.2432 46.405C47.1982 43.5765 40.1503 29.5716 33.6257 16.6672C31.8344 13.1235 30.2877 10.0639 30.122 9.69251C29.4361 8.15865 28.5029 6.73124 27.6861 5.96503C25.6934 4.09699 23.4571 3.95138 22.8196 3.95138C22.7787 3.95138 22.7454 3.95234 22.7196 3.95282H10.232C10.1907 3.95138 10.1343 3.94995 10.0644 3.94995C9.30203 3.94995 7.37363 4.11704 5.93954 5.66475C4.27355 7.48791 5.16217 10.992 5.26873 11.3858C5.3199 11.5744 5.60672 12.5187 6.30804 14.8288C13.51 38.5466 17.2409 51.4673 17.3996 53.236C17.3996 53.4327 17.3991 53.8414 17.3991 54.42C17.3987 55.0076 17.3987 55.7762 17.3982 56.6986C17.3982 57.7073 17.3977 58.9008 17.3977 60.2341H19.2759C19.2759 59.878 19.2759 59.53 19.2759 59.1953C19.2759 57.8085 19.2759 56.6083 19.2764 55.6497C19.2764 54.7494 19.2768 54.0624 19.2768 53.6299C19.2773 53.438 19.2773 53.2914 19.2773 53.204C19.2815 50.649 7.34875 11.8728 7.07884 10.8779C6.80939 9.88443 6.57326 7.77674 7.30604 6.97424C8.26272 5.94164 9.648 5.85952 10.0644 5.85952C10.1432 5.85952 10.1869 5.86239 10.1869 5.86239H22.752C22.752 5.86239 22.7755 5.86096 22.8196 5.86096C23.1764 5.86096 24.8888 5.93925 26.413 7.36856C26.9332 7.85694 27.7561 9.01509 28.4118 10.4812C29.0639 11.9439 44.9591 42.9463 46.4852 47.0762C46.9921 48.4487 47.6418 50.6586 48.0606 53.5172C48.1563 54.1708 48.2375 54.8615 48.3047 55.58C48.4093 56.7081 48.4732 57.9121 48.4788 59.1867C48.4793 59.2478 48.4816 59.307 48.4816 59.3686C48.4816 59.5892 48.4816 59.8818 48.4816 60.2341H50.3593C50.3593 59.8818 50.3593 59.5887 50.3593 59.3686C50.3589 58.411 50.3241 57.4982 50.2678 56.6227C50.2143 55.7963 50.1401 55.0081 50.0495 54.261Z" fill="#4DBABD"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M54.3686 102.051C54.2738 106.264 50.792 109.682 46.5415 109.682H22.3962C18.0989 109.682 14.5824 106.19 14.5619 101.914C14.5614 94.8501 14.56 75.6174 14.5605 63.7533C14.5605 61.5421 14.5605 59.5891 14.5609 58.0169C14.5609 56.2215 14.5614 54.9203 14.5619 54.3117C14.2321 52.4841 11.9867 44.3669 3.44176 16.8064C2.59242 14.0677 2.42131 13.5123 2.35982 13.2901C2.00092 11.9951 1.04196 7.5418 3.76539 4.62183C6.09275 2.16138 9.0993 1.89886 10.2851 1.89886C10.3719 1.89886 10.4472 1.90029 10.5111 1.90171C10.5111 1.90171 23.1831 1.90076 23.236 1.90076C24.174 1.90076 27.4579 2.10489 30.3258 4.73814C31.464 5.78393 32.6631 7.54798 33.5354 9.45776C33.7436 9.89639 35.3389 12.9863 37.0276 16.2585C44.2871 30.321 50.8955 43.1901 52.0174 46.1623C52.7948 48.2244 54.0374 52.3208 54.3114 57.93C54.3467 58.6511 54.3681 59.3936 54.3681 60.1635V61.0251H56.2747V60.1635C56.2732 53.1021 54.7251 47.942 53.8019 45.4948C52.6413 42.4196 46.2865 30.0419 38.7229 15.3903L38.6019 15.1553C37.0638 12.175 35.4738 9.0946 35.2641 8.65691C34.2784 6.50265 32.9501 4.56629 31.6189 3.34295C28.242 0.243054 24.3489 0.00189886 23.236 0.00189886L10.5316 0.00284829C10.461 0.00142415 10.3786 0 10.2851 0C8.85193 0 5.21242 0.323281 2.37746 3.31969C-1.0266 6.96882 0.0968088 12.26 0.521958 13.7948C0.590115 14.0426 0.737392 14.5182 1.6201 17.3665C10.3557 45.5414 12.3055 52.7623 12.6554 54.4907C12.6544 55.7909 12.654 59.188 12.654 63.7548C12.654 63.7562 12.6535 63.7581 12.6535 63.7595V101.877C12.6535 101.89 12.6554 101.902 12.6554 101.915C12.664 104.051 13.376 106.021 14.5624 107.622C15.1453 108.408 15.8421 109.102 16.6319 109.682C18.2481 110.87 20.238 111.581 22.3962 111.581H46.5415C48.6997 111.581 50.69 110.87 52.3058 109.682C53.0927 109.104 53.7876 108.413 54.3686 107.63C55.5335 106.063 56.2375 104.139 56.2751 102.052C56.2761 101.993 56.2842 101.936 56.2842 101.877V91.2963H54.3686V102.051Z" fill="#4DBABD"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M45.4224 89.8573V77.0205H43.5949L40.0272 85.3814L36.3881 77.0205H34.5605V89.8573H36.49V81.8441H36.5257L39.1876 88.0164H40.7954L43.4568 81.8441H43.493V89.8573H45.4224Z" fill="#4DBABD"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M48.3848 89.8573H50.3596V77.0205H48.3848V89.8573Z" fill="#4DBABD"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M62.1131 82.7991C62.528 82.1681 62.7355 81.4376 62.7355 80.6078C62.7355 80.0314 62.6184 79.5085 62.3865 79.0398C62.1532 78.571 61.8655 78.1807 61.5243 77.8679C61.1942 77.5672 60.8277 77.3514 60.4243 77.2188C60.0209 77.0868 59.5626 77.0205 59.0509 77.0205H57.4958V77.0337H54.3091V89.8573H56.1514V84.3764H58.5055L61.013 89.8573H63.1961L60.3814 84.16C61.12 83.8838 61.6977 83.4301 62.1131 82.7991ZM58.9314 82.6458H56.1514V78.7515H59.0338C59.3519 78.7515 59.6138 78.7846 59.8185 78.8504C60.0236 78.9167 60.2113 79.0161 60.3814 79.1481C60.575 79.2923 60.7253 79.4877 60.8337 79.7343C60.942 79.9804 60.9955 80.2722 60.9955 80.608C60.9955 80.8726 60.9531 81.1284 60.8678 81.3749C60.7825 81.6215 60.6548 81.8408 60.4842 82.0328C60.3132 82.2252 60.0974 82.3753 59.8355 82.4835C59.5741 82.5917 59.2726 82.6458 58.9314 82.6458Z" fill="#4DBABD"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M73.6736 77.0205H71.6241L66.9326 83.6372H66.9006V77.0205H65.1709V89.8573H66.9006V85.9449L68.9021 83.5831L72.0084 89.8573H74.0579L70.0229 82.0867L73.6736 77.0205Z" fill="#4DBABD"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M78.0078 89.8573H84.9199V88.0183H79.6488V84.2502H84.1456V82.5194H79.6488V78.8595H84.9199V77.0205H78.0078V89.8573Z" fill="#4DBABD"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M19.415 75.0455V69.5644H23.9113V67.834H19.415V64.0473H24.686V62.2087H17.7739V75.0455H19.415Z" fill="#4DBABD"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M35.4525 67.9871C35.8669 67.356 36.0749 66.6256 36.0749 65.7962C36.0749 65.2192 35.9582 64.6964 35.725 64.2276C35.4917 63.7588 35.2049 63.3685 34.8638 63.0557C34.5337 62.7555 34.1667 62.5391 33.7633 62.4071C33.3595 62.2745 32.9022 62.2087 32.3904 62.2087H27.6484V75.0455H29.4907V69.5644H31.8446L34.352 75.0455H36.5354L33.7209 69.3481C34.4599 69.0723 35.0371 68.6181 35.4525 67.9871ZM34.207 66.5628C34.1217 66.8093 33.9935 67.0286 33.8234 67.2211C33.6528 67.4131 33.4366 67.5632 33.1752 67.6718C32.9133 67.7795 32.6123 67.8341 32.2712 67.8341H29.4908V63.9392H32.3735C32.6916 63.9392 32.9535 63.9728 33.1581 64.0386C33.3628 64.1044 33.5495 64.2038 33.721 64.3363C33.9142 64.4806 34.065 64.6755 34.1728 64.922C34.2807 65.1686 34.3351 65.4605 34.3351 65.7962C34.3351 66.0608 34.2922 66.3162 34.207 66.5628Z" fill="#4DBABD"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M46.4097 64.0473V62.2087H39.4976V75.0455H46.4097V73.2064H41.1382V69.4387H45.6349V67.7078H41.1382V64.0473H46.4097Z" fill="#4DBABD"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M48.3848 75.0455H50.3596V62.2087H48.3848V75.0455Z" fill="#4DBABD"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M54.3181 62.2087H54.3091V75.0455H58.473C58.8429 75.0455 59.1947 74.9587 59.5279 74.7843C59.861 74.6103 60.1524 74.3667 60.4023 74.0538C60.6521 73.742 60.8505 73.3595 60.9991 72.9092C61.1469 72.4584 61.2212 71.957 61.2212 71.4039C61.2212 71.0794 61.1889 70.7578 61.1236 70.4391C61.0591 70.1209 60.9593 69.8256 60.8254 69.5556C60.6915 69.2852 60.5219 69.0537 60.3186 68.8613C60.1153 68.6697 59.8797 68.5309 59.6111 68.4466V68.4105C59.8981 68.2429 60.1359 68.0533 60.3257 67.8428C60.5156 67.6323 60.6656 67.4096 60.777 67.1757C60.8881 66.9413 60.9642 66.6952 61.0062 66.436C61.0475 66.1782 61.0685 65.9165 61.0685 65.6519C61.0685 65.1471 61.0062 64.6847 60.8809 64.2637C60.756 63.8431 60.5711 63.4796 60.3257 63.1731C60.0808 62.8666 59.7754 62.6293 59.4101 62.4607C59.0443 62.2926 58.6208 62.2087 58.1399 62.2087H54.3181ZM59.625 70.5471C59.6899 70.781 59.7222 71.0247 59.7222 71.2771C59.7222 71.53 59.6899 71.7732 59.625 72.0075C59.5601 72.2414 59.463 72.4466 59.3335 72.6206C59.2041 72.795 59.0372 72.9358 58.8339 73.044C58.6302 73.1527 58.3897 73.2063 58.1121 73.2063H55.8081V69.3479H58.1121C58.3897 69.3479 58.6302 69.402 58.8339 69.5102C59.0372 69.6188 59.2041 69.7602 59.3335 69.9341C59.463 70.1086 59.5601 70.3123 59.625 70.5471ZM57.9733 63.9392C58.5191 63.9392 58.9216 64.1224 59.1805 64.4893C59.4401 64.8558 59.5699 65.2856 59.5699 65.7787C59.5699 66.2831 59.4401 66.7163 59.1805 67.0769C58.9216 67.437 58.5191 67.6173 57.9733 67.6173H55.8081V63.9392H57.9733Z" fill="#4DBABD"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M68.1901 72.1792H73.0136L73.9966 75.0455H76.0328L71.4057 62.2087H69.7979L65.1709 75.0455H67.208L68.1901 72.1792ZM70.5837 64.8403H70.6195L72.4596 70.4481H68.7441L70.5837 64.8403Z" fill="#4DBABD"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M84.9062 66.9774C84.8969 66.551 84.8739 66.1904 84.8376 65.8956C84.8009 65.6013 84.7487 65.3396 84.6797 65.1115C84.6115 64.883 84.5177 64.6364 84.3988 64.3718C84.0785 63.6628 83.6648 63.1248 83.1574 62.7584C82.6503 62.392 82.0714 62.2087 81.4227 62.2087H78.0078V75.0455H81.3263C82.058 75.0455 82.6752 74.8413 83.1782 74.433C83.6808 74.0241 84.0785 73.5198 84.3713 72.918C84.4807 72.6899 84.5722 72.4736 84.6456 72.2689C84.719 72.0647 84.7761 71.8128 84.8169 71.5121C84.8584 71.2115 84.8854 70.8358 84.8991 70.385C84.9129 69.9343 84.9199 69.3481 84.9199 68.6274C84.9199 67.9544 84.9151 67.4043 84.9062 66.9774ZM83.4248 70.1327C83.4156 70.4991 83.3996 70.7998 83.3763 71.0342C83.3533 71.2681 83.317 71.461 83.2673 71.6111C83.2165 71.7612 83.1506 71.9205 83.0683 72.0887C82.6843 72.8342 82.0808 73.2065 81.258 73.2065H79.4888V64.0474H81.258C81.6601 64.0474 81.9937 64.1258 82.2591 64.2822C82.5241 64.4382 82.771 64.7208 82.9997 65.1296C83.1001 65.3094 83.1802 65.4868 83.2395 65.6613C83.2992 65.8357 83.3426 66.0516 83.37 66.3103C83.3974 66.5691 83.4156 66.8873 83.4248 67.2659C83.4337 67.6445 83.4382 68.1221 83.4382 68.699C83.4382 69.2882 83.4337 69.7662 83.4248 70.1327Z" fill="#4DBABD"/>
						</svg>
					</div>

					<div class="lg:hidden">
						<a href="#" aria-label="Toggle navigation" id="primary-menu-toggle">
							<svg viewBox="0 0 20 20" class="inline-block w-6 h-6" version="1.1"
								 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
								<g stroke="none" stroke-width="1" fill="currentColor" fill-rule="evenodd">
									<g id="icon-shape">
										<path d="M0,3 L20,3 L20,5 L0,5 L0,3 Z M0,9 L20,9 L20,11 L0,11 L0,9 Z M0,15 L20,15 L20,17 L0,17 L0,15 Z"
											  id="Combined-Shape"></path>
									</g>
								</g>
							</svg>
						</a>
					</div>
				</div>

				<?php
				wp_nav_menu(
					array(
						'container_id'    => 'primary-menu',
						'container_class' => 'hidden mt-4 p-4 lg:mt-0 lg:p-0 lg:bg-transparent lg:block',
						'menu_class'      => 'lg:flex lg:-mx-4',
						'theme_location'  => 'primary',
						'li_class'        => ' text-slate-900 hover:text-primary uppercase bold text-3xl md:text-base lg:mx-4',
						'fallback_cb'     => false,
					)
				);
				?>
			</div>
		</div>
	</header>

	<div id="content" class="site-content flex-grow bg-slate-50 text-dark">

		<?php if ( is_front_page() ) { ?>
			<!-- Start introduction -->
			<div class="container max-w-screen-lg mx-auto my-12 py-48 ">
				<h1 class="font-bold text-lg text-secondary uppercase">Freibad Mirke 2022</h1>
				<h2 class="text-3xl lg:text-7xl tracking-tight font-extrabold mb-8 text-primary">Wir bauen ein Freibad</h2>
				<p class="max-w-screen-md text-lg lg:text-xl font-light md:ml-16 mb-4">Wasser und der Zugang zu sauberem Wasser waren prägend für die Entwicklung der Menschen und die Urbanisierung des bergischen Landes. Wasser war und ist für das Leben in Wuppertal von elementarer Bedeutung.</p>
				
				<a href="#" class="w-auto flex-none  text-lg leading-6 font-semibold border border-transparent rounded-xl  hover:underline hover:underline-offset-3 hover:decoration-wavy transition-colors duration-200  md:ml-16">
					Entdecken >
				</a>
			</div>

			
			<div class="h-96  py-8 bg-cover bg-center bg-[url('http://localhost:3000/wordpress/wp-content/uploads/2021/11/hp_logo_fertig_a1.png')]">
				<div class="container h-full mx-auto ">
					<div class="bg-white h-full  max-w-lg p-6">
						<h3 class="text-primary font-bold text-lg mb-6">
							Lorem dolor amer
						</h3>
						<p class="leading-6">
							Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
						</p>
					</div>
				</div>
			</div>

			


			<!-- End introduction -->
		<?php } ?>

		<?php do_action( 'tailpress_content_start' ); ?>

		<main>
