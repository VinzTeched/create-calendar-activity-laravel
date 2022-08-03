<nav id="menu">
		<ul class="listview-icons">
			<li><a href="/"><i class="fa fa-home"></i>&nbsp; Home</a></li>
			<li><a href="{{ route('about') }}"><i class="fa fa-user"></i>&nbsp; About</a></li>
			<li><span><i class="fa fa-download"></i>&nbsp; Download</span>
				<ul>

					<li><span>Texture</span>
						<ul>
							<li><a href="{{ route('category', 'animals') }}">Animals</a></li>
							<li><a href="{{ route('category', 'stone') }}">Stone</a></li>
							<li><a href="{{ route('category', 'roof') }}">Roof</a></li>
							<li><a href="{{ route('category', 'wood') }}">Wood</a></li>
							<li><a href="{{ route('category', 'wall') }}">Wall</a></li>
						</ul>
					</li>
					
					<li><span>Templates</span>
						<ul>
							<li><a href="{{ route('category', '3d-mock-up') }}">3D Mockups</a></li>
							<li><a href="{{ route('category', 'web-design-templates') }}">Web Design Templates</a></li>
							<li><a href="{{ route('category', '3d-templates') }}">3D Templates</a></li>
							<li><a href="{{ route('category', 'premier-tiles') }}">Premier Tiles</a></li>
							<li><a href="{{ route('category', 'source-code') }}">Source Codes</a></li>
						</ul>
					</li>
										
					<li><span>Videos</span>
						<ul>
							<li><a href="{{ route('category', 'funny-videos') }}">Funny Videos</a></li>
							<li><a href="{{ route('category', 'cartoons') }}">3D Animations</a></li>
							<li><a href="{{ route('category', '3d-simulations') }}">Cartoons</a></li>
						</ul>
					</li>
															
					<li><span>Apps</span>
						<ul>
							<li><a href="{{ route('category', 'mobile-application') }}">Mobile Apps</a></li>
							<li><a href="{{ route('category', 'web-application') }}">Web Apps</a></li>
						</ul>
					</li>
																				
					<li><span>Photos</span>
						<ul>
							<li><a href="{{ route('category', 'wildlife') }}">Wildlife</a></li>
							<li><a href="{{ route('category', 'screensavers') }}">">Screensavers</a></li>
						</ul>
					</li>
					
				</ul>
			</li>
			<li><span><i class="fa fa-picture-o"></i>&nbsp; Design</span>
				<ul>

					<li><a href="{{ route('gallery') }}">Gallery</a></li>
					
					<li><a href="{{ route('tutorial') }}">Tutorials</a></li>
					
				</ul>
			</li>
			
			<li><a href="{{ route('blog-index') }}"><i class="fa fa-bullhorn"></i>&nbsp; Blog</a></li>
			
			<li><span><i class="fa fa-code"></i>&nbsp; Code</span>
				<ul>

					<li><span>Web Design</span>
						<ul>
							<li><a href="{{ route('category_done', 'html') }}">HTML</a></li>
							<li><a href="{{ route('category_done', 'css') }}">CSS</a></li>
							<li><a href="{{ route('category_done', 'javascript') }}">JavaScript</a></li>
							<li><a href="{{ route('category_done', 'bootstrap') }}">Bootstrap</a></li>
							<li><a href="{{ route('category_done', 'angular') }}">Angular</a></li>
							<li><a href="{{ route('category_done', 'django') }}">Django</a></li>
						</ul>
					</li>
					
					<li><span>Web Development</span>
						<ul>
							<li><a href="{{ route('category_done', 'php') }}">PHP</a></li>
							<li><a href="{{ route('category_done', 'node.js') }}">Node.js</a></li>
							<li><a href="{{ route('category_done', 'laravel') }}">Laravel</a></li>
							<li><a href="{{ route('category_done', 'cake') }}">Cake</a></li>
						</ul>
					</li>
										
					<li><span>Mobile Apps</span>
						<ul>
							<li><a href="{{ route('category_done', 'android') }}">Android</a></li>
							<li><a href="{{ route('category_done', 'ios') }}">IOS</a></li>
							<li><a href="{{ route('category_done', 'react-native') }}">React Native</a></li>
						</ul>
					</li>
															
					<li><span>Desktop Apps</span>
						<ul>
							<li><a href="{{ route('category_done', 'vb.net') }}">VB.Net</a></li>
							<li><a href="{{ route('category_done', 'c++') }}">VB.Net</a></li>
							<li><a href="{{ route('category_done', 'python') }}">Python</a></li>
						</ul>
					</li>
					
				</ul>
			</li>

			<li class="Divider">More</li>
			<li><a href="{{ route('login') }}"><i class="fa fa-sign-in-alt"></i>&nbsp; Sign in</a></li>
			<li><a href="{{ route('contact') }}"><i class="fa fa-envelope"></i>&nbsp; Contact</a></li>
		</ul>
	</nav>