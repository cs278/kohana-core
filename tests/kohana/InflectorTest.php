<?php defined('SYSPATH') OR die('Kohana bootstrap needs to be included before tests run');

/**
 * Tests Kohana inflector class
 *
 * @group kohana
 * @group kohana.inflector
 *
 * @package    Unittest
 * @author     Kohana Team
 * @author     Jeremy Bush <contractfrombelow@gmail.com>
 * @copyright  (c) 2008-2010 Kohana Team
 * @license    http://kohanaphp.com/license
 */
class Kohana_InflectorTest extends Kohana_Unittest_TestCase
{
	/**
	 * Provides test data for test_lang()
	 * 
	 * @return array
	 */
	public function provider_uncountable()
	{
		return array(
			// $value, $result
			array('fish', TRUE),
			array('cat', FALSE),
		);
	}

	/**
	 * Tests Inflector::uncountable
	 *
	 * @test
	 * @dataProvider provider_uncountable
	 * @param boolean $input  Input for File::mime
	 * @param boolean $expected Output for File::mime
	 */
	public function test_uncountable($input, $expected)
	{
		$this->assertSame($expected, Inflector::uncountable($input));
	}

	/**
	 * Provides test data for test_lang()
	 * 
	 * @return array
	 */
	public function provider_singular()
	{
		return array(
			// $value, $result
			array('fish', NULL, 'fish'),
			array('cats', NULL, 'cat'),
			array('cats', 2, 'cats'),
			array('cats', '2', 'cats'),
			array('children', NULL, 'child'),
			array('meters', 0.6, 'meters'),
			array('meters', 1.6, 'meters'),
			array('meters', 1.0, 'meter'),
			array('status', NULL, 'status'),
			array('statuses', NULL, 'status'),

			array('expenses', null, 'expense'),
			array('responses', null, 'response'),
		);
	}

	/**
	 * Tests Inflector::singular
	 *
	 * @test
	 * @dataProvider provider_singular
	 * @param boolean $input  Input for File::mime
	 * @param boolean $expected Output for File::mime
	 */
	public function test_singular($input, $count, $expected)
	{
		$this->assertSame($expected, Inflector::singular($input, $count));
	}

	/**
	 * Provides test data for test_lang()
	 * 
	 * @return array
	 */
	public function provider_plural()
	{
		return array(
			// $value, $result
			array('fish', NULL, 'fish'),
			array('cat', NULL, 'cats'),
			array('cats', 1, 'cats'),
			array('cats', '1', 'cats'),
			array('movie', NULL, 'movies'),
			array('meter', 0.6, 'meters'),
			array('meter', 1.6, 'meters'),
			array('meter', 1.0, 'meter'),

			array('expense', null, 'expenses'),
			array('response', null, 'responses'),
		);
	}

	/**
	 * Tests Inflector::plural
	 *
	 * @test
	 * @dataProvider provider_plural
	 * @param boolean $input  Input for File::mime
	 * @param boolean $expected Output for File::mime
	 */
	public function test_plural($input, $count, $expected)
	{
		$this->assertSame($expected, Inflector::plural($input, $count));
	}

	public function provider_singular_plural()
	{
		return array(
			array('house', 'houses'),
			array('powerhouse', 'powerhouses'),
			array('bus', 'buses'),
			array('bus', 'buses'),
			array('menu', 'menus'),
			array('news', 'news'),
			array('food menu', 'food menus'),
			array('menu', 'menus'),
			array('quiz', 'quizzes'),
			array('matrix row', 'matrix rows'),
			array('matrix', 'matrices'),
			array('vertex', 'vertices'),
			array('index', 'indices'),
			array('alias', 'aliases'),
			array('aliases', 'aliases'),
			array('media', 'media'),
			array('alumnus', 'alumni'),
			array('bacillus', 'bacilli'),
			array('cactus', 'cacti'),
			array('focus', 'foci'),
			array('fungus', 'fungi'),
			array('nucleus', 'nuclei'),
			array('octopus', 'octopuses'),
			array('radius', 'radii'),
			array('stimulus', 'stimuli'),
			array('syllabus', 'syllabi'),
			array('terminus', 'termini'),
			array('virus', 'viruses'),
			array('person', 'people'),
			array('glove', 'gloves'),
			array('dove', 'doves'),
			array('life', 'lives'),
			array('knife', 'knives'),
			array('wolf', 'wolves'),
			array('shelf', 'shelves'),
			array('', ''),
		);
	}

	/**
	 * @dataProvider provider_singular_plural
	 */
	public function test_singular_to_plural($singular, $plural)
	{
		$this->assertSame($plural, Inflector::plural($singular));
	}

	/**
	 * @dataProvider provider_singular_plural
	 */
	public function test_plural_to_singular($singular, $plural)
	{
		$this->assertSame($singular, Inflector::singular($plural));
	}

	/**
	 * Provides test data for test_camelize()
	 * 
	 * @return array
	 */
	public function provider_camelize()
	{
		return array(
			// $value, $result
			array('mother cat', 'camelize', 'motherCat'),
			array('kittens in bed', 'camelize', 'kittensInBed'),
			array('mother cat', 'underscore', 'mother_cat'),
			array('kittens in bed', 'underscore', 'kittens_in_bed'),
			array('kittens-are-cats', 'humanize', 'kittens are cats'),
			array('dogs_as_well', 'humanize', 'dogs as well'),
		);
	}

	/**
	 * Tests Inflector::camelize
	 *
	 * @test
	 * @dataProvider provider_camelize
	 * @param boolean $input  Input for File::mime
	 * @param boolean $expected Output for File::mime
	 */
	public function test_camelize($input, $method, $expected)
	{
		$this->assertSame($expected, Inflector::$method($input));
	}
}
