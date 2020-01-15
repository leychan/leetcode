package leetcode

func Rotate(nums []int, k int) []int {
	num := []int{}
	length := len(nums)
	num = append(num, nums[length-1])
	for i := 0; i < k; i++ {
		nums = nums[:len(nums)-1]
		nums = append(num, nums...)
		num = []int{}
		num = append(num, nums[length-1])
	}
	return nums
}
