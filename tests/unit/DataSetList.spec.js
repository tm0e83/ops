import { mount } from '@vue/test-utils'
import DataSetList from '@/components/DataSetList.vue'

describe('DataSetList.vue', () => {
  it('received prop ´datasets´ is an array', () => {
    const wrapper = mount(DataSetList, {
      propsData: {
        datasets: []
      }
    });

    expect(wrapper.props().datasets instanceof Array).toBe(true);
  })
})